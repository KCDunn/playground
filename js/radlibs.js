$(document).ready(function(){
    $(document.body).ready(function() {
        $("#wrapper").fadeIn(800);
    });
    
    

    $(".link").click(function() {
        event.preventDefault();

        newLocation = this.href;
        $("").fadeOut(300, newPage);
    });

    function newPage() {
        window.location = newLocation;
    }
});







// form validation for Radlibs_____________________________________________________________________



function validateNoun(field)
{
    if (field == "") return "Noun was not entered.\n"
    else if (/[^\w]/.test(field)) return "Only letters can be used in Noun.\n"
    return ""
}

function validateVerb(field)
{
    if (field == "") return "Verb was not entered.\n"
    else if (/[^a-zA-Z]/.test(field)) return "Only letters can be used in Verb.\n"
    return ""
}

function validateAdjective(field)
{
    if (field == "") return "Adjective was not entered.\n"
    else if (/[^a-zA-Z]/.test(field)) return "Only letters can be used in Adjective.\n"
    return ""
}

function validateWord(field)
{
    if (field == "") return "Pronoun was not entered.\n"
    else if (/[^a-zA-Z]/.test(field)) return "Only letters can be used in Pronoun.\n"
    return ""
}

function validateAdverb(field)
{
    if (field == "") return "Adverb was not entered.\n"
    else if (/[^a-zA-Z]/.test(field)) return "Only letters can be used in Adverb.\n"
    return ""
}

function validateName(field)
{
    if (field == "") return "Name was not entered.\n"
    else if (/[^a-z A-Z]/.test(field)) return "Only letters can be used in Name.\n"
    return ""
}