<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<script> function test() {
    // event.preventDefault()
    // alert(1111)
    axios.post('/api/category').then((res) => {
        let category = res.data
        console.log(category.data);
    })
}
    </script>
<body>
    <form action="" onsubmit="test()">
        <button type="submit">aaa</button>
    </form>
</body>
</html>