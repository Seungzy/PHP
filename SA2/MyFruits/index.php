<?php
$fruits = [
    [
        "name" => "Apple",
        "image" => "images/apple.png",
        "description" => "Color Red/Green",
        "facts" => "Apples are rich in fiber and vitamin C."
    ],
    [
        "name" => "Banana",
        "image" => "images/banana.png",
        "description" => "Color Yellow",
        "facts" => "Bananas are a good source of potassium."
    ],
    [
        "name" => "Cherry",
        "image" => "images/cherry.png",
        "description" => "Color Red",
        "facts" => "Cherries contain antioxidants that reduce inflammation."
    ],
    [
        "name" => "Grape",
        "image" => "images/grapes.png",
        "description" => "Color Purple/Green",
        "facts" => "Grapes are used to make wine and are high in antioxidants."
    ],
    [
        "name" => "Kiwi",
        "image" => "images/kiwi.png",
        "description" => "Color Brown outside, Green inside",
        "facts" => "Kiwis have vitamin C."
    ],
    [
        "name" => "Mango",
        "image" => "images/mango.png",
        "description" => "Color Yellow/Orange",
        "facts" => "Mangoes are known as the king of fruits in many countries."
    ],
    [
        "name" => "Orange",
        "image" => "images/orange.png",
        "description" => "Color Orange",
        "facts" => "Oranges are famous for their vitamin C content."
    ],
    [
        "name" => "Papaya",
        "image" => "images/papaya.png",
        "description" => "Color Orange",
        "facts" => "Papayas aid digestion with the enzyme papain."
    ],
    [
        "name" => "Pineapple",
        "image" => "images/pineapple.png",
        "description" => "Color Yellow inside, Spiky outside",
        "facts" => "Pineapples contain bromelain, which helps digestion."
    ],
    [
        "name" => "Strawberry",
        "image" => "images/strawberry.png",
        "description" => "Color Red",
        "facts" => "Strawberries are rich in antioxidants and vitamin C."
    ]
];

usort($fruits, function($a, $b) {
    return strcmp($a["name"], $b["name"]);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lists of Fruits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>My Fruits</h1>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Facts</th>
        </tr>
        <?php foreach ($fruits as $fruit): ?>
        <tr>
            <td><img src="<?php echo $fruit['image']; ?>" alt="<?php echo $fruit['name']; ?>"></td>
            <td><?php echo $fruit['name']; ?></td>
            <td><?php echo $fruit['description']; ?></td>
            <td><?php echo $fruit['facts']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
