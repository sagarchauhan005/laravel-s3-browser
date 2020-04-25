<div id="about-project">
    <h4><b>Laravel S3 Browser</b></h4>
    <p>This project was created solely for personal use, because I wanted to access my S3 bucket
        and systematically delete files from it.</p>
</div>

<div id="about-project">
    <h4><b>Getting Started</b></h4>
    <ol>
        <li>Edit your environment file with the following variables and assign their values</li>
        <li>
            <ul>
                <li>AWS_ACCESS_KEY_ID</li>
                <li>AWS_SECRET_ACCESS_KEY</li>
                <li>AWS_DEFAULT_REGION</li>
                <li>AWS_BUCKET</li>
            </ul>
        </li>
        <li>Run <code>composer update</code> and wait for all the dependencies to load</li>
        <li>Run <code>php artisan serve</code></li>
        <li>Enjoy.</li>
    </ol>
    <h5><b>NOTE</b></h5>
    <p>If you want only images, set <code>ONLY_IMAGE_RESULT=true</code> and <code>IMAGE_PAGINATION_COUNT={large number}</code>, so that it can skip non-image files for pagination</p>
</div>

<div id="about-project-author">
    <h4><b>About author</b></h4>
    <p>
        <a href="https://twitter.com/chauhansahab005">Sagar Chauhan</a>
        works as a Technical Lead at <a href="https://www.theveu.com">Veu</a> and
        <a href="https://www.weareanimal.co">Animal Advertising Pvt Ltd</a>.
        In his spare time, he hunts bug as a Bug Bounty Hunter.
        Follow him at
        <a href="https://www.instagram.com/chauhansahab005/">Instagram</a>,
        <a href="https://twitter.com/chauhansahab005">Twitter</a>,
        <a href="https://facebook.com/sagar.chauhan3">Facebook</a> &
        <a href="https://github.com/sagarchauhan005">Github</a>.
    </p>
</div>

<hr>

<div class="row preview-container-paginate">
    <div class="col-md-12">
        {{$files->links()}}
    </div>
</div>
<blockquote>
    <mark>PS : Hover to know the name of the file</mark>
</blockquote>
