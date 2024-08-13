<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Form Submissions</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
            <tr>
                <td>{{ $submission->id }}</td>
                <td>{{ $submission->name }}</td>
                <td>{{ $submission->email }}</td>
                <td>{{ $submission->subject }}</td>
                <td>{{ $submission->message }}</td>
                <td>{{ $submission->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>