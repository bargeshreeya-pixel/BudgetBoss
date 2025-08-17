<!DOCTYPE html>
<html>
<head>
    <title>Record details</title>
    <style>
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 0px;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type=text], input[type=number], input[type=date] {
            padding: 10px;
            width: 100%;
            border-radius: 3px;
            border: none;
            background-color: white;
        }

        select {
            padding: 10px;
            width: 100%;
            border-radius: 3px;
            border: none;
            background-color: white;
        }

        button[type=submit] {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            float: right;
            size: 20px;
        }

        button[type=submit]:hover {
            background-color: #00688B;
        }

        form {
            width: 60%;
            margin: auto;
            padding: 70px;
            background-color: #dbfaa6;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* margin-top: 150px; */
            font-family: 'Roboto', sans-serif
        }

        body{
            background-color:#006400;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 10px;
            font-weight:bold;
            font-family: 'Roboto', sans-serif ;
        }

        input[type=number] {
            padding: 10px;
            width: 100%;
            border-radius: 3px;
            border: none;
            background-color: white;
        }

        button[type=submit] {
            padding: 10px 30px;
            background-color: #006400;
            color: white;
            border:#006400;
            border-radius: 20px;
            cursor: pointer;
            float: right;
            margin-top: 15px;
        }
        button[type=reset]{
            padding: 10px 30px;
            background-color: #006400;
            color: white;
            border:#006400;
            border-radius: 20px;
            cursor: pointer;
            float: left;
            margin-top: 15px;
            /* margin-left: 30px; */
        }

        button[type=submit]:hover, button[type=reset]:hover {
            background-color: #00688B;
        }

        .logo{

        position: absolute;
        float: right;
        margin-top: -260px;
        margin-left: 600px;
        }
    </style>
</head>
<body>
    

    <form>

        <h1>ADD ACCOUNT DETAILS</h1>
        <img src="BudgetBoss__3_-removebg-preview.png" class="logo">
        <label for="account-number">Account Number:</label>
        <input type="text" id="account-number" name="account-number" required>

        <label for="account-type">Account Type:</label>
        <select id="account-type" name="account-type" required>
            <option value="">Select Account Type</option>
            <option value="savings">Savings</option>
            <option value="checking">Checking</option>
            <option value="credit-card">Credit Card</option>
            <option value="investment">Investment</option>
        </select>

        <label for="current-balance">Current Balance:</label>
        <input type="text" id="current-balance" name="current-balance" required>

        <!-- <button type="submit">ADD</button> -->

        <br><br><h1>INCOME</h1>
        <label for="income-amount">Amount:</label>
        <input type="number" id="income-amount" name="income-amount" required>

        <!-- <label for="income-account">Account Number:</label>
        <input type="text" id="income-account" name="income-account" required> -->

        <!-- <button type="submit">ADD</button> -->

        <br><br><h1>EXPENSE</h1>
        <!-- <label for="expense-number">Expense Number:</label>
        <input type="text" id="expense-number" name="expense-number" required> -->

        <label for="expense-amount">Amount:</label>
        <input type="number" id="expense-amount" name="expense-amount" required>

        <label for="expense-date">Date:</label>
        <input type="date" id="expense-date" name="expense-date" required>

        <label for="expense-category">Category:</label>
        <select id="expense-category" name="expense-category" required>
            <option value="">Select Expense Category</option>
            <option value="food">Food</option>
            <option value="housing">Housing</option>
            <option value="transportation">Transportation</option>
            <option value="entertainment">Entertainment</option>
            <option value="education">Education</option>
            <option value="healthcare">Healthcare</option>
            <option value="other">Other</option>
        </select>

        <!-- <button type="submit">ADD</button> -->

<br>
        <br><br><h1>BUDGET</h1>
        <label for="budget-monthly">Monthly Budget:</label>
        <input type="number" id="budget-monthly" name="budget-monthly" required>

        <label for="budget-yearly">Yearly Budget:</label>
        <input type="number" id="budget-yearly" name="budget-yearly" required>

        <label for="budget-vacation">Vacation Budget:</label>
        <input type="number" id="budget-vacation" name="budget-vacation" required>

        <button type="submit">ADD</button>
        <button type="reset">CLEAR</button>


        
    </form>

    <!-- <form>
        <h1>Budget Tracker</h1>
        <label for="budget-monthly">Monthly Budget:</label>
        <input type="number" id="budget-monthly" name="budget-monthly" required>

        <label for="budget-yearly">Yearly Budget:</label>
        <input type="number" id="budget-yearly" name="budget-yearly" required>

        <label for="budget-vacation">Vacation Budget:</label>
        <input type="number" id="budget-vacation" name="budget-vacation" required>

        <button type="submit">Add Budget</button>
    </form> -->


</body>
</html>