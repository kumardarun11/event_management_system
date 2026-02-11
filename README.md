# Event Management System (EMS)

A role-based **Event Management System** built using **PHP, MySQL, HTML, and CSS**.
The application follows a modular structure with **Maintenance → Transactions → Reports** flow, along with Admin/User access control, session handling, and a styled dashboard UI.

Designed to run on **XAMPP** for academic submission and demonstration.

---

## 🚀 Features

* Secure login with hidden password field
* Role-based access (Admin / User)
* Maintenance module (Admin only)
* Transactions module
* Reports module
* Dashboard with summary cards and recent tables
* Membership creation & update with duration rules
* Event registration workflow
* Form validations
* Session management
* Styled responsive UI
* Flow chart page included

---

## 🧭 Application Flow

```
Login
  → Dashboard
    → Maintenance (Admin only)
    → Transactions
    → Reports
  → Logout
```

Maintenance data is required before Transactions and Reports are used.

---

## 👤 User Roles

### Admin

* Access Maintenance, Transactions, Reports
* Add / update events
* Add / update memberships
* Add participants
* Create users with role selection
* View dashboard tables with edit links

### User

* Access Transactions and Reports only
* Cannot access Maintenance screens

---

## 🛠 Modules

### Maintenance (Admin Only)

* Add Event
* Update Event
* Add Membership (6 months / 1 year / 2 years)
* Update Membership (extend or cancel by membership number)
* Add Participant
* Create Users

### Transactions

* Register participant to event
* Select event + active membership
* Checkbox confirmation logic
* Stored in registrations table

### Reports

* Shows registration data
* Event name + member name + date
* Based on transaction records

### Dashboard

* Summary counters
* Recent Events table (with edit links)
* Recent Memberships table
* Recent Registrations table
* Status warnings if maintenance incomplete

---

## 🗄 Database Tables

The system uses these tables:

* `users`
* `events`
* `memberships`
* `participants`
* `registrations`

IDs are generated using date-time format for readability, for example:

```
M260211143208
P260211143455
```

---

## ⚙️ Setup Instructions (XAMPP)

1. Install XAMPP
2. Start **Apache** and **MySQL**
3. Copy project folder into:

```
C:\xampp\htdocs\
```

4. Open phpMyAdmin and create database:

```
ems
```

5. Import the provided SQL file (or run table create scripts)

6. Open in browser:

```
http://localhost/<project-folder>/login.php
```

---

## 🔑 Default Login (if seed data used)

Admin:

```
username: admin
password: admin
```

User:

```
username: user
password: user
```

---

## ✅ Validation Rules Implemented

* All mandatory fields enforced
* Radio buttons → single selection
* Checkbox → yes/no meaning
* Membership number required for update
* Capacity numeric validation
* Session required for protected pages
* Admin-only route protection

---

## 🎨 UI Highlights

* Modern navigation bar
* Card-based dashboard
* Grid-aligned forms
* Styled tables with hover effect
* Success and error alert boxes
* Consistent spacing and layout

---

## 📚 Learning Outcomes

This project demonstrates:

* PHP PDO database access
* Role-based authorization
* Session handling
* Modular architecture
* CRUD operations
* Form validation
* MySQL schema design
* UI layout structuring

---

## 📄 Usage

This project is built for academic learning, demonstration, and submission purposes.

---

## 👨‍💻 **Developer**

**D ARUN KUMAR**  
📧 [kumardarun11@gmail.com](mailto:kumardarun11@gmail.com)  
🔗 [Portfolio](http://kumardarun11.github.io/portfolio)  
🐙 [GitHub](https://github.com/kumardarun11)  
💼 [LinkedIn](https://linkedin.com/in/kumardarun11)

---
