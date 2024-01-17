document.addEventListener("DOMContentLoaded", function() {
    const blogs = [
        { title: "JavaScript Basics", content: "Introduction to JavaScript basics and fundamentals." },
        { title: "Advanced JavaScript", content: "Exploring advanced topics in JavaScript." },
        
    ];

    const blogListSection = document.querySelector(".search-right");
    blogs.forEach(blog => {
        const blogElement = document.createElement("div");
        blogElement.className = "blog-entry";
        blogElement.innerHTML = `
            <div class="card">
            <h2>${blog.title}</h2>
            <p>${blog.content}</p>
            </div>
        `;
        blogListSection.appendChild(blogElement);
    });
});
