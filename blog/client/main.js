let requestMessage = async function(){
    let response = await fetch("../server/script.php?action=getMessages");
    let data = await response.json();
    let section = document.querySelector("section.messages");
    section.innerHTML = "";
    data.forEach(item => {
        // Create and append <p> elements for username and message
        let usernameP = document.createElement("p");
        usernameP.textContent = `Pseudo: ${item.pseudo}`;
        section.appendChild(usernameP);

        let messageP = document.createElement("p");
        messageP.textContent = `Message: ${item.message}`;
        section.appendChild(messageP);
    });
    
    /*let p = document.createElement("p");
    p.textContent = data.message;
    section.appendChild(p);*/
}

requestMessage();