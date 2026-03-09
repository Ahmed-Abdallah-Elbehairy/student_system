<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="userInfo" style="background: #7a3cff; color: white; padding: 10px; text-align: center; display: none;">
        <span>مرحباً، <strong id="userName"></strong></span>
        <button onclick="logout()" style="background: #ff4757; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; margin-right: 20px;">تسجيل خروج 🚪</button>
    </div>
    <div>
        <div class="head">
            <h2>Student Management System</h3>
                <hr>
                <div class="ab">
                    <a id="aa" href="clc.html">Calculator</a>
                </div>
                <button id="ex" type="button">📥 Download Excel</button>
        </div>

        <form class="input" id="studentForm">
            <input id="name" name="name" type="text" placeholder="Name" required>
            <input id="age" name="age" type="number" min="1" max="100" placeholder="Age" required>
            <div class="grade">
                <input id="sub1" type="number" placeholder="WEB (0-100)" min="0" max="100" name="WEP" required>
                <input id="sub2" type="number" placeholder="Data (0-100)" min="0" max="100" name="Data" required>
                <input id="sub3" type="number" placeholder="System (0-100)" min="0" max="100" name="System" required>
                <input id="sub4" type="number" placeholder="MICRO (0-100)" min="0" max="100" name="MICRO" required>
                <input id="sub5" type="number" placeholder="OR (0-100)" min="0" max="100" name="OR" required>
                <input id="sub6" type="number" placeholder="Discrete (0-100)" min="0" max="100" name="Discrete" required>
                <button id="submit" type="submit">Add Student</button>
            </div>

            <div class="output">

                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>WEB</th>
                        <th>Data</th>
                        <th>System</th>
                        <th>MICRO</th>
                        <th>OR</th>
                        <th>Discrete</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </form>
    </div>
    <script>
        window.addEventListener('load', function() {
            checkAuth();
        });

        function checkAuth() {
            const loggedInUser = localStorage.getItem('loggedInUser');

            if (!loggedInUser) {

                alert('⚠️ يجب تسجيل الدخول أولاً للوصول إلى هذه الصفحة');
                window.location.href = 'login.html';
                return;
            }

            const userData = JSON.parse(loggedInUser);
            document.getElementById('userName').textContent = userData.fullName;
            document.getElementById('userInfo').style.display = 'block';
        }

        function logout() {
            if (confirm('هل أنت متأكد من تسجيل الخروج؟')) {
                localStorage.removeItem('loggedInUser');
                alert('✅ تم تسجيل الخروج بنجاح');
                window.location.href = 'login.html';
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="main.js"></script>
</body>

</html>