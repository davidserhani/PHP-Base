<?php
require(__DIR__.'/partials/header.php');
?>
<div class="container">
    <div class="notification">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-8">
                <div class="tile">
                    <div class="tile is-parent is-vertical">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Vertical...</p>
                            <p class="subtitle">Top tile</p>
                        </article>
                        <article class="tile is-child notification is-warning">
                            <p class="title">...tiles</p>
                            <p class="subtitle">Bottom tile</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child notification is-info">
                            <p class="title">Middle tile</p>
                            <p class="subtitle">With an image</p>
                            <figure class="image is-4by3">
                                <img src="https://bulma.io/images/placeholders/640x480.png">
                            </figure>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-danger">
                        <p class="title">Wide tile</p>
                        <p class="subtitle">Aligned with the right tile</p>
                        <div class="content">
                            <!-- Content -->
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child notification is-success">
                    <div class="content">
                        <p class="title">Tall tile</p>
                        <p class="subtitle">With even more content</p>
                        <div class="content">
                            <!-- Content -->
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Text input">
            </div>
        </div>

        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
            </div>
            <p class="help is-success">This username is available</p>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
            </div>
            <p class="help is-danger">This email is invalid</p>
        </div>

        <div class="field">
            <label class="label">Subject</label>
            <div class="control">
                <div class="select">
                    <select>
                        <option>Select dropdown</option>
                        <option>With options</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>

        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="radio">
                    <input type="radio" name="question">
                    Yes
                </label>
                <label class="radio">
                    <input type="radio" name="question">
                    No
                </label>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php
require(__DIR__.'/partials/footer.php');
?>
