<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SodaPHP - Error</title>
</head>
<style>
    * {
        padding: 0;
        box-sizing: border-box;
        margin: 0;
    }
    body {
        width: 100%;
        height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: #0f1f31;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
    }
    .card-error {
        width: 450px;
        border: 1px solid #c2c9fe;
        border-radius: 4px;
        padding: 1rem;
    }
    .card-error h1 {
        font-size: 1.5rem;
        line-height: 1.5rem;
        font-weight: 700;
        /* letter-spacing: .5px; */
        margin-bottom: 1rem; 
    }
</style>
<body>
    <div class="card-error">
        <h1>
            <?php 
                echo !empty($this->dataview->title) 
                    ? $this->dataview->title 
                    : 'ERROR'
            ?>
        </h1>
        <p><?php echo !empty($this->dataview->message) ? $this->dataview->message : 'Something is not working...' ?></p>
    </div>

</body>
</html>