<!doctype html>
<html>
    <h1> Anonymous Email Mail Sender (For Educational Purposes Only)</h1>
    <table border=1>
        <form action="fakemail.php" method="post">
            <tr><td>Recipent: </td><td><input type=text name=email size=30></td></tr>
            <tr><td>Sender name: </td><td><input type=text name=name size=30></td></tr>
            <tr><td>Sender Email Address: </td><td><input type=text name=sender size=30></td></tr>
            <tr><td>Subject: </td><td><input type=text name=subject size=30></td></tr>
            <tr><td>Content: </td><td><textarea rows=10 cols=30 name=content></textarea></td></tr>
            <tr><td><input type=submit value="Send Mail"></td></tr>
        </form>
    </table>
</html>