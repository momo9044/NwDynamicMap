var fan = function () {
    TYPO3.jQuery('.draggable').draggable(
        {
            containment: "#buehne",
            scroll: false,
            drag: function () {
                var $this = TYPO3.jQuery(this);
                var thisPos = $this.position();
                var parentPos = $this.parent().position();

                var x = thisPos.left;
                var y = thisPos.top;
                TYPO3.jQuery("#positionX").val(x);
                TYPO3.jQuery("#positionY").val(y);
                TYPO3.jQuery("#posL").text(x);
                TYPO3.jQuery("#posT").text(y);

            }
        }
    );

    TYPO3.jQuery('#item-image').change(function () {
        alert(this.value)
    });


    TYPO3.jQuery('.draggable').text(TYPO3.jQuery("#itemNumber").val());
    TYPO3.jQuery("#itemNumber").keyup(function () {
        TYPO3.jQuery('.draggable').text('').text(TYPO3.jQuery(this).val());
        console.log(TYPO3.jQuery(this).val());
    });
    TYPO3.jQuery('.draggable').css({
        backgroundColor: '#' + TYPO3.jQuery("#circleBgColor").val(),
        borderColor: '#' + TYPO3.jQuery("#circleBorderColor").val(),
    });
    TYPO3.jQuery("#circleBgColor").change(function () {
        TYPO3.jQuery('.draggable').css({
            backgroundColor: '#' + TYPO3.jQuery(this).val(),

        });
        console.log(TYPO3.jQuery(this).val());
    });

    TYPO3.jQuery("#circleBorderColor").change(function () {
        TYPO3.jQuery('.draggable').css({
            borderColor: '#' + TYPO3.jQuery(this).val(),
        });
        console.log(TYPO3.jQuery(this).val());
    });
    TYPO3.jQuery('select#selectStage').on('change', function () {
        var val = TYPO3.jQuery('select#selectStage').val();
        TYPO3.jQuery('.stageImage').each(function () {
            TYPO3.jQuery(this).hide();
        });
        TYPO3.jQuery('#stageImage_' + val).show(10, function () {
            var stageHeight = TYPO3.jQuery(this).data().stageHeight;
            var stageWidth = TYPO3.jQuery(this).data().stageWidth;
            TYPO3.jQuery('#buehne').css({
                width: stageWidth,
                height: stageHeight
            });

        });
    });


};
