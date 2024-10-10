# Truck Management System

This is a Laravel-based application to manage trucks and their subunits. The project includes CRUD functionality for trucks, as well as the ability to assign subunits to trucks. Subunits are defined as temporary replacements for trucks that are unavailable.

## Features

### 1. Truck CRUD
Users can perform CRUD operations for trucks, which include the following fields:

| Field       | Type             | Notes                                                                                 |
|-------------|------------------|---------------------------------------------------------------------------------------|
| Unit number | String (max: 255) | The unique identifier of the truck, e.g., A1578, 8050, 147859, B7845. (Required)       |
| Year        | Integer           | The year of the truck's first registration. Allowed values range from 1900 to the current year + 5. (Required) |
| Notes       | Text (optional)   | Optional notes, e.g., "Available for rent."                                           |

### 2. Subunits

Subunits are trucks that temporarily replace other trucks when they are unavailable, e.g., due to a breakdown. Each truck can have multiple subunits, and any truck can act as a subunit for another.

#### Subunit Fields

The subunit assignment requires the following fields:
- **Main truck**: The truck being replaced.
- **Subunit**: The truck that is replacing the main truck.
- **Start date**: The date when the subunit begins its role.
- **End date**: The date when the subunit ends its role.

#### Subunit Validations

1. A truck cannot be assigned as its own subunit.
2. Subunit date ranges must not overlap with other subunits for the same truck.
   - Example: If truck A has a subunit from April 1, 2023, to April 15, 2023, no other subunit can be assigned for those dates.
3. If a truck is already acting as a subunit for another truck, it cannot be assigned its own subunit during that time period.
   - Example: If truck B is a subunit for truck A from April 1, 2023, to April 10, 2023, truck B cannot have its own subunit during that time.

## Technical Requirements

- The project is built using the latest version of **Laravel**.
- It includes migrations, models, controllers, and views for managing both trucks and subunits.
- Bootstrap 5 is used for front-end styling, with added animations and hover effects to enhance user experience.
- Validation is implemented to ensure data integrity and avoid conflicts.


## Running the Project

1. **Clone the repository:**

   ```bash
   git clone https://github.com/MatasPal/TrucksSystem.git

2. **Navigate to the project directory:**

   ```bash
   cd trucks-project
   
3. **Install dependencies:**

   ```bash
   composer install

4. **Create a .env file:**

   To create the .env file, you can copy .env.example:
   ```bash
   cp .env.example .env

5. **Configure the database:**

   Open the .env file and set the following parameters:
   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=localhost
   DB_PORT=5432
   DB_DATABASE=dbtrucks
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password

6. **Create database:**
   Create it manually, or by running this command in terminal:
   ```bash
   createdb -U postgre dbtrucks 

7. **Run the database migrations:**

   Execute the following command to create the necessary tables(in terminal):
   ```bash
   php artisan migrate

8. **Run the program:**

   Type this command in terminal:
   ```bash
   php artisan serve
