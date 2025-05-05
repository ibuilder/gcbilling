# GCBilling - Construction Billing Application

GCBill is a web-based Laravel application designed to help General Contractors manage project billing, including Schedule of Values (SOV), Applications for Payment (similar to AIA G702/G703 format), and Change Orders.

## Features

*   **User Authentication:** Secure login and session management.
*   **Project Management:** Create and manage construction projects (basic details, contract info).
*   **Schedule of Values (SOV):** Define line items and scheduled values for projects.
*   **Budget (GMP):** Guarenteed maximum price (GMP) budget model for projects.
*   **Applications for Payment:**
    *   Create billing applications based on SOV.
    *   Input work completed and materials stored for the billing period.
    *   Calculates retainage and payment due (based on G702/G703 logic).
*   **Change Orders:** Track and manage project change orders affecting the contract sum.
*   **AIA G702/G703 Data Generation:** Library to calculate and structure data for standard AIA billing forms.
*   **General Conditions:** Staff costs and misc. expenses related to general contractor conditions.
*   **Organizational Chart:** Project staff and chart of staff organization.
*   **PDF Export:** Generate PDF documents (requires configuration, e.g., for billing applications).
*   **Excel Export:** Export data arrays to XLSX format (requires configuration).
*   **Basic MVC Structure:** Organized using Models, Views, and Controllers.
*   **Helper Classes:** Utilities for calculations, security (CSRF), validation, views, etc.