@include('pages.header')
@include('pages.sidebar')
<main>
    <h1>REGISTRATION</h1>
    <form>
        <label>First Name : </label>
        <input type="text" name="fname" id="fname" required><br/><br/>
        <label>Last Name : </label>
        <input type="text" name="lname" id="lname" required><br/><br/>
        <label>Email : </label>
        <input type="email" name="mail" id="mail" required><br/><br/>
        <button type="submit">Submit</button>
    </form>
</main>
@include('pages.footer')
