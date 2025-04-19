# 🛒 ClickCart – Laravel E-Commerce Platform

**Live Demo:** [clickcart.arhamnatiq.com](https://clickcart.arhamnatiq.com)  
**GitHub Repository:** [github.com/arham-natiq25/ClickCart](https://github.com/arham-natiq25/ClickCart)

---

## 📦 Overview

**ClickCart** is a powerful and fully-featured e-commerce web application built with Laravel. It simplifies the online shopping experience through three distinct user roles: **Admin**, **Vendor**, and **Customer**.

With a dynamic admin panel, multi-payment gateway integration, real-time chat, and responsive UI, ClickCart offers everything you need to run a modern e-commerce platform.

---

## ✨ Features

### 👥 Multi-Role Access
- **Admin:** Manage users, products, orders, and oversee platform operations.
- **Vendor:** List products, manage inventory, and communicate with customers.
- **Customer:** Browse products, manage cart, and complete purchases.

### 🧑‍💼 Dynamic Admin Panel
- Intuitive and user-friendly interface to manage all platform activities.

### 💳 Multi-Payment Gateway Integration
- Seamlessly supports **Stripe**, **PayPal Checkout**, **Razorpay**, and **2Checkout**.

### 💬 Real-time Chat System
- Enables direct messaging between vendors and customers using **Laravel Echo + Pusher**.

### 📊 Advanced Data Management
- Uses **jQuery DataTables** for interactive and responsive data display and management.

### 📱 Responsive Design
- Optimized layout for desktops, tablets, and mobile devices.

---

## 🛠 Tech Stack

| Layer        | Technology                                 |
|--------------|---------------------------------------------|
| **Backend**  | Laravel                                     |
| **Frontend** | Blade Templates, jQuery, Bootstrap          |
| **Database** | MySQL                                       |
| **Auth**     | Laravel's built-in authentication system    |
| **Payments** | Stripe, PayPal, Razorpay, 2Checkout         |
| **Chat**     | Laravel Echo, Pusher                        |

---

## 📸 Screenshots

![Dashboard Screenshot](https://github.com/user-attachments/assets/071ebc18-b9c2-4855-8394-18017e63eda5)
![Product Page Screenshot](https://github.com/user-attachments/assets/c4e9ca33-e41c-406b-b5cb-482c1b440e0a)

---

## 🚀 Getting Started

```bash
git clone https://github.com/arham-natiq25/ClickCart.git
cd ClickCart
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
