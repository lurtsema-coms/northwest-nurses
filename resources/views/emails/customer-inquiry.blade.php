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
    <h1>New Customer Inquiry</h1>
    <p style="padding-top: 15px; padding-bottom: 15px">Your contact form received a new response.</p>
    <table>
        <tbody>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td><strong>Message:</strong></td>
                <td>{{ $form_message }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
