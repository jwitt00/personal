"use strict";

class Model{

    async getComments(articleID){
        let response = await fetch("http://localhost/projects/assign3-jbg-no-group/api/getComments.php?articleID=" + articleID);
        let comments = await response.json();
        return comments;
    }

    async addComment(comment){
        const commentData = Object.fromEntries(comment);
        const commentDataJSON = JSON.stringify(commentData);
        console.log(commentDataJSON);

        const fetchOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: commentDataJSON
        };

        const response = await fetch('http://localhost/projects/assign3-jbg-no-group/api/addComment.php?articleID=' + comment['articleID'] + 'authorID='+ comment['authorID'] + 'content='+ comment['content']);
        const result = response.json();
        return result;
    }

}

class View{

    async renderTable(comments){
        let table = document.getElementById('commentstable');
        let view = "<thead><tr><th>Content</th><th>Author</th></tr></thead><tbody>";
        comments.forEach(comment => {

            view = view + "<tr><td>" + comment['content'] + "</td><td>" + comment['authorID'] + "</td></tr>";

        });
        table.innerHTML=view;
        let message = document.getElementById('message');
        message.innerHTML = "Updated: " + new Date();
    }


}

class Controller{

    constructor(model, view){
         this.model = model;
         this.view = view;
         this.attachListeners();
    }
 
    attachListeners(){
         const commentform = document.getElementById('commentform');
         commentform.addEventListener('Post',(event) => this.handlerAddForm(event));
 
         setInterval( (event) => this.showComments(),10000);
    }
 
    async handlerAddForm(event){
         event.preventDefault();
 
         const form = event.currentTarget;
         const formData = new FormData(form);
         console.log("FormData:" + formData);
         const responseData = await this.model.addComment(formData);
         form.reset();
    }
 
    async showComments(){
            

        let comments = await this.model.getComments(articleID);
        await this.view.renderCommentSection(comments);
    }
}
 
 const controller = new Controller(new Model(),new View());
 controller.showComments();