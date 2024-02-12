<?php
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/view_form.css">

    <title>View Form</title>
</head>


<body>

    <div class="bxp container">
        <div class="console">
            <div class="outin">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div id="output1" class="outp1">

                    </div>
                    <div class="inpbx btn">
                        <input type="submit" value="Submit" name="submit" id="submit">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>

        function generateMCQ(mq, op1, op2, op3, op4) {

            const questionContainer = document.createElement('div');
            questionContainer.classList.add('mcq-container');

            const userQuestion = mq;

            const question = document.createElement('p');
            question.textContent = userQuestion;

            questionContainer.appendChild(question);

            const a = op1;
            const b = op2;
            const c = op3;
            const d = op4;

            const options = [a, b, c, d];

            options.forEach((option, index) => {

                const label = document.createElement('label');


                const radioBtn = document.createElement('input');
                radioBtn.type = 'radio';

                radioBtn.value = option;
                var mx="answer[]";
                radioBtn.name = mx;
                label.textContent = option;
                label.appendChild(radioBtn);


                questionContainer.appendChild(label);

            });

            document.getElementById("output1").appendChild(questionContainer);
        }


        function createTextArea(lbltax) {

            var newdiv = document.createElement("div");
            newdiv.classList.add("inpbx");

            let lbll = lbltax;

            var label = document.createElement("label");
            label.innerHTML = lbll + ": ";

            var textArea = document.createElement("textarea");
            textArea.rows = 20;

            var tax="answer[]";
          
            textArea.name = tax;

            newdiv.appendChild(label);
            newdiv.appendChild(document.createElement("br"));
            newdiv.appendChild(textArea);

            document.getElementById("output1").appendChild(newdiv);
        }


        function createInputtxt(type, lbltx) {
            var newDiv = document.createElement("div");
            newDiv.classList.add("inpbx");
            var newInput = document.createElement("input");
            var tx ="answer[]";
            newInput.type = type;
            
            newInput.name = tx;

            let lbl = lbltx;

            var label = document.createElement("label");
            label.innerHTML = lbl + ": ";

            newDiv.appendChild(label);
            newDiv.appendChild(newInput);
            document.getElementById("output1").appendChild(newDiv);
        }


        function createInputnum(type, lblnm) {
            var newDiv = document.createElement("div");
            newDiv.classList.add("inpbx");
            var newInput = document.createElement("input");
            var nx ="answer[]";
       
            newInput.name = nx;
            newInput.type = type;

            let lbl = lblnm;

            var label = document.createElement("label");
            label.innerHTML = lbl + ": ";

            newDiv.appendChild(label);
            newDiv.appendChild(newInput);
            document.getElementById("output1").appendChild(newDiv);
        }

    </script>
    <?php
    if (isset($_GET['preq_id'])) {
        $preq_id = $_GET['preq_id'];
        $select_query = "SELECT * FROM `preq_data` WHERE preq_id=$preq_id";
        $result_query = pg_query($conn, $select_query);

        $qids = array();

        $num = "number";
        $ta = "textarea";
        $txt = "text";
        $mcq = "mcq";
        while ($row = pg_fetch_assoc($result_query)) {
            $preq_id = $row['preq_id'];
            $q_id = $row['q_id'];
            $question = $row['question'];
            $input_type = $row['input_type'];
            $opt1 = $row['opt1'];
            $opt2 = $row['opt2'];
            $opt3 = $row['opt3'];
            $opt4 = $row['opt4'];

            $qids[] = $q_id;

            $nx = $tx = $tax = $mx = $q_id;
            $lblnm = $question;
            $lbltx = $question;
            $lbltax = $question;
            $mq = $question;

            if ($input_type == $num) {
                echo '<script type="text/javascript">',
                    'createInputnum("' . $input_type . '", "' . $lblnm . '");',
                    '</script>'
                ;
            }
            if ($input_type == $ta) {
                echo '<script type="text/javascript">',
                    'createTextArea("' . $lbltax . '");',
                    '</script>'
                ;
            }
            if ($input_type == $txt) {
                echo '<script type="text/javascript">',
                    'createInputtxt("' . $input_type . '", "' . $lbltx . '");',
                    '</script>'
                ;
            }
            if ($input_type == $mcq) {
                echo '<script type="text/javascript">',
                    'generateMCQ("' . $mq . '","' . $opt1 . '","' . $opt2 . '","' . $opt3 . '","' . $opt4 . '");',
                    '</script>'
                ;
            }


        }

    }

    
    ?>
</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $preq_id = $_GET['preq_id'];
    $answers = $_POST['answer'];

    $xoxo = array_combine($qids, $answers);

    foreach ($xoxo as $qids => $answers) {

        $insert_x = pg_query($conn, "INSERT INTO `pre_answer` (preq_id, q_id, answer) VALUES ('$preq_id', '$qids', '$answers')");
    
    }

}
?>