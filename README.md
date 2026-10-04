# 💼 JOMS - Job Marketplace System

A full-featured job marketplace platform built with Laravel, connecting job seekers with employers.

![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green)

## 📋 Overview

JOMS (Job Opportunity Management System) is a comprehensive job portal where employers can post job listings and job seekers can find and apply for positions. The system features separate dashboards for employers and job seekers, application tracking, resume/CV management, and more.

## 🌟 Key Features

### 👔 For Employers
- **Company Profile Management**: Build and maintain your employer brand
- **Job Posting**: Create, edit, and manage job listings with detailed descriptions
- **Application Management**: Review, accept, or reject job applications
- **Candidate Search**: Browse and search through job seeker profiles
- **Job Copying**: Easily duplicate existing job postings

### 👨‍💼 For Job Seekers
- **Professional Profiles**: Showcase your skills, experience, and education
- **Job Search**: Find jobs by keywords, location, industry, and more
- **Application Tracking**: Monitor the status of your applications
- **Resume/CV Management**: Upload and manage multiple resume versions
- **Job Applications**: Apply to positions with customized cover letters

### ⚙️ System Features
- **Role-Based Access Control**: Secure separation between job seekers and employers
- **Authentication System**: Registration, login, password reset, email verification
- **Responsive Design**: Works on desktop and mobile devices
- **Search & Filtering**: Advanced search with multiple filters
- **Data Export**: Download CVs and resumes
- **RESTful API Ready**: Built with Laravel's expressive syntax

## 🛠️ Technology Stack

- **Backend**: Laravel 9.x (PHP Framework)
- **Frontend**: Blade Templates, CSS, JavaScript
- **Database**: MySQL
- **Authentication**: Laravel Breeze/JWT
- **Development**: Composer, npm/yarn

## 📋 Prerequisites

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & npm (for asset compilation)

## 🚀 Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/joms.git
   cd joms
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**:
   ```bash
   npm install
   ```

4. **Copy environment file**:
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Configure database**:
   - Edit `.env` file with your database credentials
   - Create database: `CREATE DATABASE joms;`

7. **Run migrations**:
   ```bash
   php artisan migrate --seed
   ```

8. **Compile assets**:
   ```bash
   npm run dev
   ```

9. **Start the server**:
   ```bash
   php artisan serve
   ```

10. **Access the application**:
    - Visit: `http://localhost:8000`
    - Admin panel: `http://localhost:8000/dashboard`

## 👥 User Roles

### Job Seeker
- Browse and search jobs
- Create and manage profile
- Upload and manage resumes/CVs
- Apply for jobs
- Track application status

### Employer
- Manage company profile
- Post and manage job listings
- Review and manage applications
- Search for candidates
- Manage job applications

## 📁 Project Structure

```
joms/
├── app/                 # Application logic
│   ├── Http/           # Controllers and middleware
│   ├── Models/         # Eloquent models
│   └── Providers/      # Service providers
├── bootstrap/          # Framework bootstrapping
├── config/             # Configuration files
├── database/           # Migrations, seeders, factories
├── public/             # Public assets (compiled)
├── resources/          # Views, raw assets, language files
├── routes/             # Web and API routes
├── storage/            # Logs, cached files, uploads
├── tests/              # Unit and feature tests
└── ...                 # Configuration files
```

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**REKIK Yassine**  
Full-Stack Developer | Laravel Specialist

Connect with me:
- 💼 [LinkedIn](https://linkedin.com/in/yourprofile)
- 💬 [Discord](https://discord.gg/rekiksinoy)
- 📧 [Email](mailto:your@email.com)

---
*Built with ❤️ using Laravel*