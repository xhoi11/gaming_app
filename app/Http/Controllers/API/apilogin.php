<?php?>
<script>


    function login() {
        fetch("/api/login?method=cookie")
        .then((res) => {
            if (res.status == 200) {
                return res.json()
                } else {
                throw Error(res.statusText)
                }
        })
            .then((data) => {
            logResponse("loginResponse", `Cookie set with token value: ${data.token}`)
            })
            .catch(console.error)
    }

    function makeRequest() {
        fetch("/api/echo")
        .then((res) => {
            if (res.status == 200) {
                return res.text()
                } else {
                throw Error(res.statusText)
                }
        }).then(responseText => logResponse("requestResponse", responseText))
            .catch(console.error)
    }

    function execute() {
        content = document.getElementById("payload").value;
        eval(content);
    }
</script>
