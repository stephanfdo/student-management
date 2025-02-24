
## **Technologies Used**
- **Framework**: Laravel 10  
- **Database**: MySQL  
- **UI**: Tailwind CSS + Blade  
- **Server**: PHP 8.1+  

## **Key Features**
- CRUD Operations for Students  
- Address/District Management  
- Image Upload Handling  
- Age Calculation (as of 2025-01-01)  
- Validation: Phone (10 digits), Birth Date, Required Fields  

## **Installation**
1. `composer install`  
2. Configure `.env`  
3. `php artisan migrate --seed`  
4. `php artisan storage:link`  
5. `php artisan serve`

## **Validation Rules**
- Phone: 10 numeric digits  
- Birth Date: Must be ≤ 2010-01-01  




- District: Valid existing district  
- Image: JPEG/PNG (max 2MB)  

## **Notes**
- Student Code: Auto-generated (STU_0001)  
- Age: Calculated from 2025-01-01  
- Images: Stored in `storage/app/public/students`





![pro1](https://github.com/user-attachments/assets/0b93bc25-ad33-465c-9896-4257d3ccfb3a)

![pro2](https://github.com/user-attachments/assets/ed159fae-628f-4579-a6d5-056ebc1f76fd)

![pro3](https://github.com/user-attachments/assets/9fa815a5-2d9f-446a-bee4-4f61d4275173)
![pro4](https://github.com/user-attachments/assets/8e6774a4-adac-4da9-bff8-372ae2c52c81)

![pro6](https://github.com/user-attachments/assets/fc7c408d-0a0e-43df-8091-5bf38c98ed64)

![pro5](https://github.com/user-attachments/assets/defa7d29-c5f2-4ae9-ba5a-1ea149fdbef6)



