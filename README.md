# Hospital Management System

Hospital Management System is a comprehensive platform developed with PHP and Laravel that facilitates seamless interaction between patients and doctors. This system allows users and doctors to register, manage appointments, and keep track of appointment statuses, ensuring an efficient and organized healthcare experience.

## Table of Contents
- [Overview](#overview)
- [Highlighted Features](#highlighted-features)
- [User Features](#user-features)
- [Doctor Features](#doctor-features)
- [Admin Features](#admin-features)
- [Installation](#installation)
- [Support](#support)
- [License](#license)

## Overview

The Hospital Management System is designed to simplify the process of making and managing appointments between patients and doctors. Users can register, log in, and make appointments. Doctors are notified of these appointments and can manage their schedules accordingly. Admins have a dedicated panel to manage doctors and appointments, ensuring smooth operation.

## Highlighted Features
- **User and Doctor Registration:** Easy registration process for both patients and doctors.
- **Appointment Management:** Users can make appointments, and doctors get notified.
- **Appointment Status Tracking:** Users can log in and check the status of their appointments.
- **Admin Panel:** Admin can manage doctors and appointments.
- **Modern Browser Compatibility:** Ensures compatibility across different browsers.
- **User-Friendly Interface:** Intuitive and responsive design for an optimal user experience.
- **Notification System:** Email and SMS notifications for appointments.

## User Features
- **Registration and Login:** Easy registration and login process.
- **Make Appointments:** Users can book appointments with doctors.
- **Appointment Status:** Check the status of appointments.
- **Profile Management:** Manage user profile information.
- **Notification System:** Email and SMS notifications for appointments.

## Doctor Features
- **Registration and Login:** Easy registration and login process.
- **Appointment Notifications:** Get notified of new appointments.
- **Manage Appointments:** View and manage appointments.
- **Profile Management:** Manage doctor profile information.

## Admin Features
- **Manage Doctors:** Add, edit, and remove doctors.
- **Manage Appointments:** View, approve, or cancel appointments.
- **User Management:** Manage user profiles.
- **Report Generation:** Generate reports on appointments and doctors.

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/Moulin-Talukder/Hospital.git
    ```

2. Navigate to the project directory:
    ```bash
    cd hospital
    ```

3. Install the dependencies:
    ```bash
    composer install
    ```

4. Create a copy of the `.env` file:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Set up your database and update your `.env` file with the database credentials.

7. Run the database migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```

8. Serve the application:
    ```bash
    php artisan serve
    ```

## Support
For support, installation, and customization, please contact us at [support@hospital.com](mailto:support@hospital.com). We are committed to providing the best support to ensure your success.
