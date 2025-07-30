# WebTask_3
Robot arm panel controller webpage created for Smart Methods.

This project is a simple robot arm controller interface built with HTML, CSS, JavaScript, PHP, and MySQL. It allows users to control six servo motors via sliders, save custom motor poses, load or remove them, and send selected poses for execution by a microcontroller like ESP32.

Technologies Used
- HTML
- CSS
- JavaScript
- PHP 
- MySQL (via phpMyAdmin with MAMP)
- MAMP
- ESP32 or similar (for Arduino control - external)

---

Project files

-index.php           (Main UI with motor sliders, Save/Run/Reset/Load/Remove features)
-save_pose.php       (Saves current slider values to pose table)
-run_pose_direct.php (Sends current slider values to run table (status = 1))
-delete_pose.php     (Removes selected pose from the pose table)
-get_run_pose.php    (Returns latest row from run table with status = 1)
-update_status.php   (Resets all run.status to 0 (called after execution))
-db.php              (Database connection file)


Database: TASK3

1-Table: pose

Field              Type 
id                  INT    (AUTO_INCREMENT, Primary Key)
servo1 to servo6    INT    (Servo motor positions 0–180)


2-Table: run

Field             Type   
servo1 to servo6   INT 
status             INT  (1 = active, 0 = done)


---

Features

-  Six sliders to control motor positions (0–180°)
-  Save any pose to database
-  Reset all motors to default (90°)
-  Run current pose (sends values to microcontroller)
-  Load saved poses into sliders
-  Remove any saved pose
-  Backend provides JSON output to be fetched by ESP32

---
 
How I Made the Task

1. Project Planning & UI Design
 I started by understanding the task requirements.  
 I sketched the user interface layout based on the given reference image, placing six sliders to control each servo motor.

2. Environment Setup
 - I used **MAMP** to run a local web server on my MacBook.  
 - I created a new database named `TASK3` using **phpMyAdmin**.

3. Database Creation
 - I created two tables:
   - pose: to store saved motor positions.
   - run: to temporarily hold the current pose to be executed by the microcontroller.
  
4. Frontend Development (HTML/CSS/JavaScript)
 - I built the control panel using HTML and styled it with CSS.
 - I added sliders for motors and displayed the values dynamically using JavaScript.
 - I implemented Save, Reset, Run, and Load buttons.
 - The Load and Run actions are fully interactive using JavaScript.

5. Backend Development (PHP + MySQL)
- I connected the project to MySQL using a db.php file.
- I created:
  - save_pose.php to save slider values.
  - run_pose_direct.php to send current slider values to the run table.
  - delete_pose.php to remove a saved pose.
  - get_run_pose.php to provide ESP32 with the active pose in JSON.
  - update_status.php to reset the (status) to 0 after execution.

6. Functionality Testing
 - I tested each feature locally using MAMP:
   - Verified saving, loading, and removing poses.
   - Ensured the run table received correct data.
   - Confirmed JSON output from get_run_pose.php.
   - Confirmed the ESP32 could later read and reset the run status.

---

Web page UI
<img width="1440" height="900" alt="Screenshot 2025-07-29 at 11 03 50 PM" src="https://github.com/user-attachments/assets/58456ebc-3c19-4651-8c49-b954198bd1bf" />

get_run_pose.php
<img width="1440" height="900" alt="Screenshot 2025-07-30 at 4 38 08 PM" src="https://github.com/user-attachments/assets/9a5bbaa6-1e10-436c-8088-149a6b9094ce" />

update_status.php 
<img width="1440" height="900" alt="Screenshot 2025-07-30 at 4 39 30 PM" src="https://github.com/user-attachments/assets/9bce3d04-242d-42ff-ad4f-660652a9ada8" />

Thanks to Smart Methods for providing this opportunity to learn and apply robotics web integration.
