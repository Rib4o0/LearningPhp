<?php
include "./../prv/loader.php";
session_start();
echo loadTop("create","create");
?>
<main>
    <div class="questions">
        <div class="question">
            <div class="text">
                1. How long is the nile river
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                2. When were the ancient people discovered
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                3. How did the human race evolve
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                1. How long is the nile river
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                2. When were the ancient people discovered
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                3. How did the human race evolve
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                1. How long is the nile river
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                2. When were the ancient people discovered
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
        <div class="question">
            <div class="text">
                3. How did the human race evolve
            </div>
            <button class="remove"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
    <div class="questionEditor">
        <input type="text" placeholder="Type your question here" class="questionText">
        <div class="img">
            <img class="questionImg" src="/assets/empty.jpg" alt="">
            <div class="addImg"><i class="fa-solid fa-plus"></i></div>
        </div>
        <div class="answers">
            <label class="answer">
                <input type="text" placeholder="Type answer here">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="answer">
                <input type="text" placeholder="Type answer here">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="answer">
                <input type="text" placeholder="Type answer here">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="answer">
                <input type="text" placeholder="Type answer here">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="imgModal">
            <div class="title">Choose image:</div>
            <div class="inputs">
                <input class="imgURL" type="text" placeholder="Enter image url here">
                <button class="use">Use</button>
            </div>
            <div class="previewText">Preview:</div>
            <img src="/assets/invalid.jpg" class="preview" alt="">
            <button class="close"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</main>
<script src="./../prv/create.js" defer></script>
<?php
if (isset($_GET["redirected"])) {
    if ($_GET["redirected"] == "true") echo "<div class=\"hello activated right\"></div>";
} else {
    echo "<div class=\"hello\"></div>";
}
echo loadFooter();
?>
