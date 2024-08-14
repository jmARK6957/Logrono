<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
            <form action = "includes/formhandler.php" method="post">
                <label for="firstname">Firstname</label>
                <input id ="firstname" type="text" name="firstname" placeholder="firstname">

                <label for="lastname">Lastname</label>
                <input id ="lastname" type="text" name="lastname" placeholder="lastname">


                <label for="gender"Gender ?></label>
                <select id ="gender"name="gender">
                    <option value="none">None</option>
                    <option value="male">male</option>
                    <option value="famale">Famale</option>

                </select>


            </form>
    </main>
</body>
</html>