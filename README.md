# ![Work With Skills Banner](/public/screenshots/banner.png)

<div align="center">
  
[![Made with PHP](https://img.shields.io/badge/Made%20with-PHP-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-005C84?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

</div>

---

## 📖 About the Project

**Work With Skills (WWS)** is a freelancing web platform that bridges the gap between skilled individuals and freelance opportunities.  
Users can create professional profiles, showcase their skills, post and bid for projects, and collaborate on diverse freelance tasks — promoting a **skill-based collaborative economy**.

### 💡 How it Works
1. **Sign up** and create your professional profile.
2. **Showcase skills** with detailed descriptions and samples.
3. **Post projects** to hire freelancers or **bid** on available jobs.
4. Collaborate, track progress, and complete freelance tasks.
5. Build your portfolio and grow your reputation.

---

## ✨ Features
- 👤 **User Profiles** – Create and manage professional profiles with skill showcases.
- 📢 **Project Posting** – Post projects with clear requirements and budgets.
- 💰 **Bid System** – Freelancers can bid for available jobs.
- 📂 **Portfolio Management** – Upload work samples and completed projects.
- 🔒 **Secure Authentication** – User login and registration system.
- 📱 **Responsive UI** – Accessible on desktop, tablet, and mobile.

---

## 🛠 Tech Stack

| Technology  | Description |
|-------------|-------------|
| **Front-end** | HTML, CSS, JavaScript, Bootstrap |
| **Back-end**  | PHP |
| **Database**  | MySQL |

---

## 📂 Project Structure
```plaintext
WWS/
├── assets/              # CSS, JS, and image files
├── config/              # Database connection and config files
├── includes/            # Header, footer, reusable components
├── pages/               # Main PHP pages (home, profile, projects, etc.)
├── uploads/             # User-uploaded files and images
├── index.php            # Home page
├── db.sql               # Database schema
└── README.md            # Project documentation
```
---

## 📸 Screenshots

![Home Page](screenshots/home.png)
![Login Page](screenshots/login.png)
![User Profile](screenshots/profile.png)
![Project Listing](screenshots/projects.png)
![Bid Page](screenshots/bid.png)
![Dashboard](screenshots/dashboard.png)

---

## 🛠️ Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/DevPanchal2610/WWS.git
   ```

2. **Navigate into the Project**
   ```bash
   cd WWS
   ```

3. **Set up the Database**
   - Create a database in MySQL (e.g., `wws`).
   - Import `db.sql` into your MySQL database.

4. **Configure Database Connection**
   - Open `/config/db.php` and update:
     ```php
     $host = "localhost";
     $username = "root";
     $password = "";
     $dbname = "wws";
     ```

5. **Run the Application**
   - Place the project folder in your `htdocs` (XAMPP) or `www` (WAMP) directory.
   - Start Apache and MySQL.
   - Visit `http://localhost/WWS`

---

## 🤝 Contributing

Contributions are always welcome!

1. Fork the repository  
2. Create a feature branch  
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes  
   ```bash
   git commit -m "Description of changes"
   ```
4. Push to your branch  
   ```bash
   git push origin feature-name
   ```
5. Create a Pull Request

---

## 🙌 Acknowledgements

- [PHP](https://www.php.net/)
- [Bootstrap](https://getbootstrap.com/)
- [MySQL](https://www.mysql.com/)
- [Font Awesome](https://fontawesome.com/)

---

## 📫 Connect with Me

- 💼 [LinkedIn](https://www.linkedin.com/in/dev-panchal2610/)
- 💻 [GitHub](https://github.com/DevPanchal2610)
