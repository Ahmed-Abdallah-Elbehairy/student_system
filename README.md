# Smart Student Management System 🎓

An integrated web platform that simplifies teachers' work in managing student data and grades efficiently and quickly.

---

## ✨ Features

✅ **Complete Student Management**
- Add new students
- Edit student information
- Delete student records

✅ **Grade Tracking**
- Track grades for 6 subjects:
  - WEP (Web & E-Learning Programming)
  - Data Structures
  - System Design
  - Microprocessors
  - Operations Research
  - Discrete Mathematics

✅ **Automatic Calculations**
- Calculate total grades automatically
- Calculate average GPA automatically

✅ **Excel Export**
- Export all student data to Excel with one click
- Includes totals and averages

✅ **Built-in Calculator**
- Integrated calculator for quick calculations

✅ **User-Friendly Interface**
- Dark theme for comfortable viewing
- Responsive design
- Fast and smooth performance

---

## 💼 Benefits for Teachers

⏱️ **Save Time** - Eliminate manual calculations
📊 **Organize Data** - Professional data management
🔄 **Quick Updates** - Edit records in seconds
📥 **Easy Reports** - Export data instantly
🎯 **Track Progress** - Monitor student performance easily

---

## 🛠️ Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Libraries:** 
  - Math.js (Calculator)
  - SheetJS (Excel Export)

---

## 📋 System Requirements

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web Server (Apache/Nginx)
- Modern Web Browser

---

## 🚀 Installation

### 1. Download XAMPP
Download and install [XAMPP](https://www.apachefriends.org/) on your computer.

### 2. Clone or Download the Project
```bash
git clone https://github.com/YOUR_USERNAME/student_system.git
```

### 3. Place Files in htdocs
Copy the project folder to:
```
C:\xampp\htdocs\student_system\
```

### 4. Start XAMPP
- Start Apache
- Start MySQL

### 5. Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create a new database named `students_db`
3. Run this SQL query:

```sql
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    wep INT NOT NULL,
    data INT NOT NULL,
    system INT NOT NULL,
    micro INT NOT NULL,
    orr INT NOT NULL,
    discrete INT NOT NULL
);
```

### 6. Access the Application
Open your browser and go to:
```
http://localhost/student_system/index.php
```

---

## 📁 Project Structure

```
student_system/
├── index.php           # Main application page
├── clc.html           # Calculator page
├── style.css          # Main styling
├── clc.css            # Calculator styling
├── main.js            # Main JavaScript logic
├── clc.js             # Calculator logic
├── connection.php     # Database connection
├── insert.php         # Add student (API)
├── update.php         # Update student (API)
├── delete.php         # Delete student (API)
├── get.php            # Get all students (API)
└── README.md          # This file
```

---

## 🔐 Security Notes

⚠️ **Important:** This is a learning project. For production use:
- Use Prepared Statements to prevent SQL Injection
- Add user authentication and authorization
- Validate all user inputs
- Use HTTPS for data encryption
- Never expose database credentials in code

---

## 🎮 How to Use

### Add a Student
1. Fill in the form fields:
   - Name
   - Age
   - Subject grades (0-100)
2. Click "Add Student"
3. Student appears in the table below

### Update a Student
1. Click "Update" button next to the student
2. Edit the information
3. Click "Update Student"

### Delete a Student
1. Click "Delete" button next to the student
2. Record is removed from the database

### Export to Excel
1. Click "📥 Download Excel" button
2. Excel file downloads automatically with:
   - All student information
   - Total grades
   - Average GPA

### Use Calculator
1. Click "Calculator" link
2. Perform calculations
3. Click "Back" to return to main application

---

## 📧 Contact & Support

If you have any questions or suggestions, feel free to reach out!

---

## 📄 License

This project is free to use for educational purposes.

---

**Made with ❤️ for Teachers & Students**
