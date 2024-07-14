const addImgBtn = document.querySelector(".addImg");
const closeModalBtn = document.querySelector(".close")
const imgModal = document.querySelector(".imgModal");
const imgUrlInput = document.querySelector(".imgURL");
const imgPreview = document.querySelector(".preview");
const useImgBtn = document.querySelector(".use");
const questionImg = document.querySelector(".questionImg");
const questions = document.querySelector(".questions");
const answers = document.querySelectorAll(".answer")
const questionText = document.querySelector(".questionText")

let questionsArray = [
    {question: "What's eminem's real name?", imageUrl: "https://th.bing.com/th/id/R.cb801f5286963c2ed5c119778827ea4a?rik=iTQYjIz5CJir7w&pid=ImgRaw&r=0", answers: [
            {answer: "Marshall the third", correct: false},
            {answer: "I love Mathers", correct: false},
            {answer: "Marshall Mathers", correct: true},
            {answer: "Slim Shady", correct: false},
        ]
    },
    {question: "When was eminem born?", imageUrl: "https://th.bing.com/th/id/R.7dedc7205149ae1171c14519443addbe?rik=J%2bEVRtWlor%2bNIA&riu=http%3a%2f%2fwww.eminemlab.com%2fimages%2fwallpapers%2fEminem-22-1024x768b.jpg&ehk=SCh9GQznfIxMSZRJb%2byuRyseHr9sdzRzHpIf%2fx9JZYA%3d&risl=&pid=ImgRaw&r=0", answers: [
            {answer: "1969", correct: false},
            {answer: "1972", correct: true},
            {answer: "1975", correct: false},
            {answer: "2000", correct: false},
        ]
    },
];

let selectedQuestion = 0;

addImgBtn.addEventListener("click", () => {
    imgModal.classList.add("show");
})

closeModalBtn.addEventListener("click", () => {
    imgModal.classList.remove('show')
})

function isValidImage(url) {
    return new Promise((resolve) => {
        const img = new Image();
        img.onload = () => resolve(true);
        img.onerror = () => resolve(false);
        img.src = url;
    });
}

let isImgValid = false;
let isImgSet = false;
let url;

imgUrlInput.addEventListener("input", e => {
    isValidImage(e.target.value).then(isValid => {
        if (isValid) {
            url = e.target.value;
            imgPreview.setAttribute("src", url);
            imgPreview.classList.remove("invalid");
            isImgValid = true;
        }
        else {
            imgPreview.setAttribute("src", "/assets/invalid.jpg");
            imgPreview.classList.add("invalid");
            isImgValid = false;
        }
    });
})

useImgBtn.addEventListener("click", () => {
    if (isImgValid) {
        questionImg.setAttribute("src", url);
        questionsArray[selectedQuestion].imageUrl = url;
        updateAllQuestionsList()
        isImgSet = true;
    }
})

function truncateString(str, maxLength) {
    if (str.length > maxLength) {
        return str.slice(0, maxLength - 3) + '...';
    }
    return str;
}

loadQuestionContent(selectedQuestion);
updateAllQuestionsList()

function updateAllQuestionsList() {
    questions.innerHTML = "";
    for (let i = 0; i < questionsArray.length; i++) {
        const question = questionsArray[i];
        const container = document.createElement("div");
        container.classList.add("question");
        if (selectedQuestion === i) container.classList.add("selected")
        questions.append(container);
        const questionText = document.createElement("div");
        questionText.classList.add("text");
        questionText.textContent = `${i+1}. ${truncateString(question.question, 20)}`;
        container.append(questionText);
        if (question.imageUrl !== "") {
            const questionImg = document.createElement("img");
            questionImg.classList.add("questionPreviewImg");
            questionImg.setAttribute("src", question.imageUrl);
            container.append(questionImg)
            container.append(questionImg)
        }
        const removeBtn = document.createElement("button");
        removeBtn.classList.add("remove");
        removeBtn.innerHTML = "<i class=\"fa-solid fa-trash\"></i>";
        container.append(removeBtn)

        container.addEventListener("click", () => {
            selectedQuestion = i;
            updateAllQuestionsList();
            loadQuestionContent(i);
        })
    }
    const addQuestionBtn = document.createElement("button");
    addQuestionBtn.classList.add("addQuestion");
    addQuestionBtn.textContent = "Add Question"
    questions.append(addQuestionBtn);
}

function loadQuestionContent(index) {
    let question = questionsArray[index];
    questionText.value = question.question;
    if (question.imageUrl !== "") questionImg.src = question.imageUrl;
    else questionImg.src = "/assets/empty.jpg"
    answers.forEach((answer, index) => {
        const answerText = answer.querySelector("[type='text']");
        answerText.value = question.answers[index].answer;
        const checkBox =  answer.querySelector("[type='checkbox']");
        checkBox.checked = question.answers[index].correct;
    })
}

answers.forEach((answer, index) => {
    const answerText = answer.querySelector("[type='text']");
    answerText.addEventListener("input", e => {
        questionsArray[selectedQuestion].answers[index].answer = e.target.value;
    })
    const checkBox =  answer.querySelector("[type='checkbox']");
    checkBox.addEventListener("input", () => {
        questionsArray[selectedQuestion].answers[index].correct = checkBox.checked;
    })
})

questionText.addEventListener("input", e => {
    questionsArray[selectedQuestion].question = e.target.value;
    updateAllQuestionsList()
})