    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stud_id = $_POST["student_no"];
            $l_name = $_POST["last_name"];
            $f_name = $_POST["first_name"];
            $m_i = $_POST["middle_initial"];
            $program = $_POST["program"];
            $year_l = $_POST["year_l"];
            $email = $_POST["E-mail"];
            $phone_num = $_POST["number"];

            // Database Connection
            $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
            if ($conn->connect_error) {
                die('Connection Failed : ' . $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO students (stud_id, l_name, f_name, m_i, program, year_l, email, phone_num) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                if (!$stmt) {
                    die('Error in preparing statement: ' . $conn->error);
                }

                $stmt->bind_param("isssssss", $stud_id, $l_name, $f_name, $m_i, $program, $year_l, $email, $phone_num);

                if (!$stmt->execute()) {
                    die('Error in executing statement: ' . $stmt->error);
                }
                header("Location: addstudent.html");
                exit();
                

                $stmt->close();
                $conn->close();
            }
        }
        ?>