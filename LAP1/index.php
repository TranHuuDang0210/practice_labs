/* This HTML code represents a student results rating form. Here's a breakdown of what each section
does: */
<!DOCTYPE html>
<html>

<head>
    <title> STUDENT RESULTS RATING</title>
    <!-- Unicode Vietnamese -->
    <meta charset="UTF-8">
    <meta name="author" content=" trendemy.com" />
    <!-- CSS definition file -->
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <h2> CLASSIFICATION OF STUDENT RESULTS</h2>
        <!-- Form for sending processing results -->
        <!-- The action attribute is set to '#' which sends the form to the current page. The method is set to post. -->
        <form action="#" method="post">
            <!-- Mathematics -->
            <div class="row">
                <div class="lbltitle">
                    <label> Math scores </label>
                </div>
                <div class="lblinput">
                    <!-- The 'name' attribute is set to 'math' which is the variable name sent to the server.
                         The value attribute is populated with PHP to retain the submitted value upon form submission. -->
                    <input type="number" name="math" value="<?php echo isset($_POST['math']) ? $_POST['math'] : ""; ?>" />
                </div>
            </div>

            <!-- Physics -->
            <div class="row">
                <div class="lbltitle">
                    <label> Physics scores</label>
                </div>
                <div class="lblinput">
                    <!-- Similar to Math input, but for Physics. -->
                    <input type="number" name="physics" value="<?php echo isset($_POST['physics']) ? $_POST['physics'] : ""; ?>" />
                </div>
            </div>
            <!-- Chemistry -->
            <div class="row">
                <div class="lbltitle">
                    <label> Chemistry scores</label>
                </div>
                <div class="lblinput">
                    <!-- Similar to Math input, but for Chemistry. -->
                    <input type="number" name="chemistry" value="<?php echo isset($_POST['chemistry']) ? $_POST['chemistry'] : ""; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <label>Select an area</label>
                </div>
                <div class="lblinput">
                    <select name="khuvuc">
                        <!-- Options for selecting an area, PHP is used to retain the submitted value upon form submission. -->
                        <option value="0" selected>-- Select an area --</option>
                        <option value="1" <?php echo $_POST['area'] == 1 ? "selected" : "" ?>>Area 1</option>
                        <option value="2" <?php echo $_POST['area'] == 2 ? "selected" : "" ?>>Area 2</option>
                        <option value="3" <?php echo $_POST['area'] == 3 ? "selected" : "" ?>>Area 3</option>
                        <option value="4" <?php echo $_POST['area'] == 4 ? "selected" : "" ?>>Area 4</option>
                        <option value="5" <?php echo $_POST['area'] == 5 ? "selected" : "" ?>>Area 5</option>
                    </select>
                </div>
            </div>

            <!-- Submit button to send results -->
            <div class="row">
                <div class="submit">
                    <input type="submit" name="btnsubmit" value="Ratings" />
                </div>
            </div>
        </form>
    </div>
    <!-- Display results -->
    <div class="result">
        <h2>Rating results</h2>
        <div class="row">
            <div class="lbltitle">
                <label>Total points</label>
            </div>
            <div class="lbloutput">
                <!-- PHP is used to calculate and display total points upon form submission. -->
                <?php echo isset($_POST['btnsubmit']) ? ($_POST['math'] + $_POST['physics'] + $_POST['chemistry']) : ""; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Rating</label>
        </div>
        <div class="lbloutput">
            <?php
            // PHP is used to calculate and display the rating based on total points.
            if (isset($_POST['btnsubmit'])) {
                $totalpoints = $_POST['math'] + $_POST['physics'] + $_POST['chemistry'];
                if ($totalpoints >= 24) echo "Very Good";
                elseif ($totalpoints >= 21) echo "Good";
                elseif ($totalpoints >= 15) echo "Average";
                else echo "Weak";
            }
            ?>
        </div>
    </div>
    <!-- Display priority points -->
    <div class="row">
        <div class="lbltitle">
            <label for="">Priority point</label>
        </div>
        <div class="lbloutput">
            <?php
            // PHP is used to calculate and display priority points based on the selected area.
            if (isset($_POST["btnsubmit"])) {
                $prioritypoint_points = $_POST["area"];
                switch ($prioritypoint_points) {
                    case 0:
                    case 4:
                    case 5:
                        echo "0";
                        break;
                    case 1:
                    case 2:
                        echo "5";
                        break;
                    case 3:
                        echo "3";
                        break;
                    default:
                        echo "0";
                        break;
                }
            }
            ?>
        </div>
    </div>

</body>

</html>
