
    //initialize instance
    var enjoyhint_instance = new EnjoyHint({});

    //simple config. 
    //Only one step - highlighting(with description) "New" button 
    //hide EnjoyHint after a click on the button.
    var enjoyhint_script_steps = [
        {
            'next .navbar-all-brand' : "Welcome to OCRAnno! Let me guide you through its features." 
        },{
            'next .nav-link:eq(1)' : "After complete any annotation, you can see and edit all them by<br>"+
                "clicking the menu item 'My Annotations'"
        },{
            'next .annotation-info' : "Here you will see informations about the sentence<br>"+
            "you are annotating, as your progress in the current page."
        },{
            'next #sentence' : "This is the orginal sentence extracted from PDF on the left.<br>"+
            "Tip: You can use <text style='color: #00a6eb'>'Ctrl+F'</text> and search "+
            "for the sentence to identify <br>where it occurs on the page."
        },{
            'key #correction' : "This is the field where you will annotate the correction.<br>"+
            "Please, correct (if necessary) and press 'TAB'<br> to continue the tour!",
            'keyCode': 9
        },{
            'next #observation' : "In this field, you can left a note about the annotation,<br>"+
            "if you think that is necessary."
        },{
            'next #btn-illgebible' : "Now, if the original document is of poor quality and impossible<br>"+
                "to read, you can classify it as illegible, and undo it by editing the annotation.<br>"+
                "<i>For now, just continue.</i>"
        },{
            'click #btn-submit' : "Finally, you can click at the 'Submit' button to properly make<br>"+
                "your annotation, and complete the tour! Thanks <i class='fas fa-laugh-wink'></i>"
        }
    ];

    //set script config
    enjoyhint_instance.set(enjoyhint_script_steps);

    //run Enjoyhint script
    enjoyhint_instance.run();
