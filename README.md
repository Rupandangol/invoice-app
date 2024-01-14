# Invoice App

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Overview

The Multi-Language Invoice App is a web application developed using the Laravel framework that supports multiple languages. This app allows users to Generate and customize invoice as per need. This project was created by rupan and is open-source under the MIT License.

## Table of Contents

- [Features](#features)
- [Installation](#installation)


## Features

- **Multi-Language Support:** Invoices are available in multiple languages.
- **Invoice Generation:** Create and manage invoices with due dates, amounts, etc.

## Installation

### Prerequisites

- [Docker](https://www.docker.com/)

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/Rupandangol/invoice-app.git
2. Navigate to Repo:

   ```bash
   cd invoice_app;
3. Install Sail:

   ```bash
   composer require laravel/sail --dev
   php artisan sail:install
4. Run Migrations:

   ```bash
   ./vendor/bin/sail artisan migrate
   php artisan db:seed

5. Login Details
   ```bash
   email: admin@gmail.com
   password: password
