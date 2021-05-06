<?php

$authorID = $_SESSION['userid'];


?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Article</h5>
                        <p class="card-text">Post a new article to the blog.</p>
                        <form action="controller.php" method="POST">
                            
                            <input type="hidden" name="page" value="addArticle">
                            <input type="hidden" name="authorID" value="<?php echo $authorID; ?>"/>

                            <label for="title" class="form-label">Article Title</label>
                            <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Enter a Title" required>
                            
                            <label for="content" class="form-label">Article Content</label>
                            <input type="text" class="form-control mb-3" id="content" name="content" placeholder="Enter article content" required>
                            <!-- <textarea class="form-control mb-3" id="content" name="content" placeholder="Enter Article Content" rows="3"></textarea> -->

                            <label for="image" class="form-label">Attach Image</label>
                            <!-- <input type="file" class="form-control mb-3" id="image" name="image"> -->
                            <input type="text" class="form-control mb-3" id="image" name="image" placeholder="" required>
                            <br>

                            <label for="catID">Choose a Topic:</label>
                            <select name = "catID" id = "catID">
                            <option name = "rap" value="1">Rap/Hip-Hop</option>
                            <option name = "rock" value="2">Rock</option>
                            <option name = "pop" value="2">Pop</option>
                            </select>
                            <br>
                            <br>


                            <button type="submit" class="btn btn-primary">Post Article</button>
                        </form>

                    </div>
                </div>      
            </div>
        </div>
    </div>
