var config = {
    'map': {
        '*': { //rewrite on all modules or components
            'mage/validation': 'Mastering_SampleModule/js/validation'   // lib/web/mage/validation
        },
    }
    config: {
        mixins: {
            'Mastering_SampleModule/js/validation': {
                'Mastering_SampleModule/js/validation-mixin': true
            }
        }
    }
}
