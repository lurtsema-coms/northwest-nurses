<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>New Account Created</h1>
    <p style="padding-top: 15px; padding-bottom: 15px">A new account has been created via northwestnursesllc.</p>
    <table>
        <tbody>
            <tr>
                <td><strong>Account Email:</strong></td>
                <td>{{ $accountInfo['email']}}</td>
            </tr>
            <tr>
                <td><strong>Contact Number:</strong></td>
                <td>{{ $accountInfo['contact_number']}}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong></td>
                <td>{{ $accountInfo['address']}}</td>
            </tr>
            <tr>
                <td><strong>Role:</strong></td>
                <td>{{ $accountInfo['role']}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
