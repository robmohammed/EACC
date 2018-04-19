<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1><?=$heading?></h1>

    <?=form_open('blog2/comment_insert');?>

    <?=form_hidden('CommentID', $this->uri->segment(3));?>

    <p><textarea name="body" id="body" rows="10"></textarea></p>
    <p><input type="text" name="author" /></p>
    <p><input type="submit" value="Submit Comment" name="submit" id="submit" /></p>
    </form>
    
</body>
</html>