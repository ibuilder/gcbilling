<?php

namespace App\Helpers;

use App\Models\ApplicationForPayment;
use App\Models\ScheduleOfValue;
use Illuminate\Support\Collection;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GCBillHelper
{
    /**
     * Calculates the retainage amount.
     *
     * @param float $amount The total amount.
     * @param float $retainagePercentage The retainage percentage.
     * @return float The retainage amount.
     */
    public static function calculateRetainage(float $amount, float $retainagePercentage): float
    {
        return $amount * ($retainagePercentage / 100);
    }

    /**
     * Calculates the G702 application for payment.
     *
     * @param ApplicationForPayment $application The application for payment.
     * @param Collection $scheduleOfValues The schedule of values.
     * @return array The G702 data.
     */
    public static function calculateG702(ApplicationForPayment $application, Collection $scheduleOfValues): array
    {
        $totalWorkCompleted = $application->total_work_completed;
        $totalMaterialsStored = $application->total_materials_stored;
        $retainagePercentage = $application->retainage_percentage;
        $previousPayments = 0; // You might need to fetch this from previous applications
        $totalCompletedAndStored = $totalWorkCompleted + $totalMaterialsStored;
        $totalRetainage = self::calculateRetainage($totalCompletedAndStored, $retainagePercentage);
        $totalEarnedLessRetainage = $totalCompletedAndStored - $totalRetainage;
        $amountDue = $totalEarnedLessRetainage - $previousPayments;

        return [
            'application_number' => $application->application_number,
            'application_date' => $application->application_date,
            'billing_period_start' => $application->billing_period_start,
            'billing_period_end' => $application->billing_period_end,
            'total_work_completed' => $totalWorkCompleted,
            'total_materials_stored' => $totalMaterialsStored,
            'total_completed_and_stored' => $totalCompletedAndStored,
            'retainage_percentage' => $retainagePercentage,
            'total_retainage' => $totalRetainage,
            'total_earned_less_retainage' => $totalEarnedLessRetainage,
            'previous_payments' => $previousPayments,
            'amount_due' => $amountDue,
        ];
    }

    /**
     * Generates the G703 continuation sheet.
     *
     * @param Collection $scheduleOfValues The schedule of values.
     * @param ApplicationForPayment $application
     * @return array The G703 data.
     */
    public static function generateG703(Collection $scheduleOfValues, ApplicationForPayment $application): array
    {
        $g703Data = [];
        foreach ($scheduleOfValues as $sov) {
            // Assuming SOV has a method to retrieve related ApplicationForPaymentLineItems
            $lineItem = $sov->applicationForPaymentLineItems->where('application_for_payment_id', $application->id)->first();

            $previousWorkCompleted = 0;
            $previousStored = 0;

            if($lineItem){
                $previousWorkCompleted = $lineItem->previous_work_completed;
                $previousStored = $lineItem->previous_stored;
            }
            

            $currentWorkCompleted = 0;
            $currentStored = 0;

             if($lineItem){
                $currentWorkCompleted = $lineItem->current_work_completed;
                $currentStored = $lineItem->current_stored;
            }

            $totalCompletedAndStoredToDate = $previousWorkCompleted + $previousStored + $currentWorkCompleted + $currentStored;
            $balanceToFinish = $sov->amount - $totalCompletedAndStoredToDate;

            $g703Data[] = [
                'line_item_id' => $sov->id,
                'description' => $sov->description,
                'scheduled_value' => $sov->amount,
                'previous_work_completed' => $previousWorkCompleted,
                'previous_stored' => $previousStored,
                'current_work_completed' => $currentWorkCompleted,
                'current_stored' => $currentStored,
                'total_completed_and_stored_to_date' => $totalCompletedAndStoredToDate,
                'balance_to_finish' => $balanceToFinish,
            ];
        }

        return $g703Data;
    }

    /**
     * Generates a PDF export.
     *
     * @param string $view The view to render.
     * @param array $data The data to pass to the view.
     * @param string $filename The filename for the PDF.
     * @return \Illuminate\Http\Response
     */
    public static function generatePdf(string $view, array $data, string $filename)
    {
        $pdf = PDF::loadView($view, $data);
        return $pdf->download($filename);
    }

    /**
     * Generates an Excel export.
     *
     * @param array $data The data to export.
     * @param string $filename The filename for the Excel file.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public static function generateExcel(array $data, string $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add data to the sheet
        $row = 1;
        foreach ($data as $rowData) {
            $col = 1;
            foreach ($rowData as $cellData) {
                $sheet->setCellValueByColumnAndRow($col, $row, $cellData);
                $col++;
            }
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $tempFilename = tempnam(sys_get_temp_dir(), 'excel');
        $writer->save($tempFilename);

        return response()->download($tempFilename, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}