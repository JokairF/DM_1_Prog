const projectsContainer = document.getElementById("projects");

projects.forEach((project) => {
    const projectElement = document.createElement("div");
    projectElement.innerHTML = `
            <h2>${project.name}</h2>
            <p>${project.description}</p>
        `;
    projectsContainer.appendChild(projectElement);
});
document.addEventListener("DOMContentLoaded", (event) => {
    const textElement = document.getElementById("movableText");

    textElement.addEventListener("mouseover", () => {
        textElement.style.position = "absolute";
        textElement.style.top = `${Math.random() * window.innerHeight}px`;
        textElement.style.left = `${Math.random() * window.innerWidth}px`;
    });
});
