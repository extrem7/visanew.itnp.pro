const header = {
        controller() {

        },
        mobile() {
            $('.header .toggle-btn').click(function () {
                $('.header .menu').slideToggle();
            });
        }
    },
    visaForm = {
        controller() {
            Vue.component('input-phone', {
                template: '<input type="tel" name="Телефон" :value="value"  placeholder="+7 (___) ___-__-__" required>',
                props: ['value'],
                mounted() {
                    $this = this;
                    $(this.$el).mask("+7 (999) 999-99-99", {
                        completed() {
                            $this.$emit('change', $(this).val());
                        }
                    });
                },
            });
            const vue = new Vue({
                el: '#visaForm',
                data: {
                    countries: visa,
                    types: null,
                    nationality: nationality,
                    currentCountry: country,
                    currentType: null,
                    currentTax: null,
                    formData: {
                        name: null,
                        email: null,
                        phone: null,
                        start: new Date(),
                        startFormated: moment(this.start).format('D.MM.YY'),
                        end: new Date(),
                        endFormated: moment(this.end).format('D.MM.YY'),
                        nationality: nationality[0],
                        count: 1
                    }
                },
                watch: {
                    currentCountry() {
                        this.currentType = '';
                        this.currentTax = null;
                        console.log(nationality)
                    },
                    currentType(value) {
                        if (value !== '') {
                            this.types = this.countries[this.currentCountry][this.currentType];
                            this.currentTax = this.types[Object.keys(this.types)[0]];
                            console.log(this.currentTax)
                        }
                    },
                    'formData.start'(val) {
                        this.formData.startFormated = moment(val).format('D.MM.YY');
                    },
                    'formData.end'(val) {
                        this.formData.endFormated = moment(val).format('D.MM.YY');
                    }
                },
                components: {
                    vuejsDatepicker
                }
            });
            $('#visaForm form').submit((e) => {
                e.preventDefault();
                $('.visa-application .wpcf7-form  .wpcf7-submit').trigger('click');
            });
        }
    },
    passportForm = {
        controller() {
            new Vue({
                el: '#passport-form',
                data: {
                    prices,
                    documents,
                    registrations: taxonomies.registration,
                    currentRegistration: taxonomies.registration[0].id,
                    types: taxonomies.type,
                    currentType: taxonomies.type[0].id,
                    nationalities: taxonomies.nationality,
                    currentNationality: taxonomies.nationality[0].id,
                    ages: taxonomies.age,
                    currentAge: taxonomies.age[0].id
                },
                watch: {
                    currentRegistration() {
                        this.checkPrices();
                    },
                    currentType() {
                        this.checkPrices();
                    },
                    currentNationality() {
                        this.checkPrices();
                    },
                    currentAge() {
                        this.checkPrices();
                    }
                },
                methods: {
                    checkPrices() {
                        this.prices.forEach((price, i, arr) => {
                            let registration = price.registration.includes(this.currentRegistration),
                                types = price.type.includes(this.currentType),
                                nationalities = price.nationality.includes(this.currentNationality),
                                ages = price.age.includes(this.currentAge);
                            arr[i].show = registration && types && nationalities && ages;
                        });
                    }
                },
                created() {
                    this.checkPrices();
                }
            });
        }
    };

$(function () {
    header.controller();
    header.mobile();
    $("input[type=tel]").mask("+7 (999) 999-99-99");
    $(window).on('wpcf7:mailsent', function (e) {
        $('.modal.show').modal('hide');
        $('#thanks').modal('show');
        setTimeout(() => {
            $('#thanks').modal('hide');
        }, 3000);
        if ($(e.target).find('form').hasClass('visa-app')) {
            $('form').trigger('reset')
        }
    });
    if ($('#passport-form').length > 0) {
        passportForm.controller();
    }
    if ($('#visaForm').length > 0) {
        visaForm.controller();
    }
});