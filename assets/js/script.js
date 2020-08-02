const select = (query) => document.querySelector(query);
const fromEvent = (event) => (element) => (callback) => {
    return element.addEventListener(event, callback);
};
const fromChangeIn = fromEvent("change");

const fileInput = select(".field.is-file > .input");

if (fileInput) {
    fromChangeIn(fileInput)(({ target }) => {
        if (target.files.length > 0) {
            fileInput.parentElement.classList.add("is-active");
        }
    });
}

// const fromClickIn = fromEvent("click");
// const doRequest = (url, options) => {
//     return new Promise((resolve, reject) => {
//         fetch(url, options)
//             .then((response) => response.json())
//             .then(resolve)
//             .catch(reject);
//     });
// };

// App

// const submit = select("form.card > button.button");
// const alertElement = select(".alert");

// fromClickIn(submit)((event) => {
//     event.preventDefault();
//     const endpoint = `http://localhost/xml-storage/api/handle-xml.php`;

//     const formData = new FormData();
//     formData.append(fileInput.name, head(fileInput.files));

//     submit.setAttribute("disabled", "");

//     doRequest(endpoint, {
//         method: "POST",
//         body: formData,
//     }).then((json) => {
//         alertElement.classList.add("is-hidden");
//         submit.removeAttribute("disabled");

//         if (json.error) {
//             alertElement.classList.remove("is-hidden");
//             alertElement.classList.add("is-danger");
//             alertElement.innerHTML = json.error;
//         }
//     });
// });
