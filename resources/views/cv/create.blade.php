<!DOCTYPE html>
<html>
<head>
    <title>Create cv</title>
</head>
<body>
    <form action="{{ route('cv.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="summary" placeholder="Summary" required></textarea>
        <textarea name="experience" placeholder="Experience" required></textarea>
        <textarea name="education" placeholder="Education" required></textarea>
        <button type="submit">Generate CV</button>
    </form>
</body>
</html>
