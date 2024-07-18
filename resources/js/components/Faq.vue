<template>
    <div class="container">
                <div class="row">
                    <div class="col-12 text text-center">
                        <h1 class="">
                            FAQ
                        </h1> 
                        <div class="faq">
                                  <div v-for="(item, index) in faqItems" :key="index" class="mt-3 faq__content" w-100>
                            <button @click="toggle(index)" class="accordion-header faq__content__question">
                                {{ item.question }}
                            </button>
                            <div v-if="activeIndex === index" class="accordion-content pt-3 faq__content__answer">
                                {{ item.answer }}
                            </div>
                            </div>
                        </div>

                        <p class="text text-center mt-4">
                            Vous n'avez pas trouvé de réponses ci dessus ? <br>
                            <a href="/contact">Envoyez-nous un message</a>
                        </p> 

                    </div>
                </div>
            </div>
</template> 
 

 <script>
    export default {
        name: 'Faq',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
          activeIndex: null,
          faqItems: [
            { question: 'Comment publier une annonce sur Immobilier Bénin ?', answer: 'Inscrivez-vous, connectez-vous, puis cliquez sur "Publier une annonce" et remplissez le formulaire.' },
            { question: 'Est-ce que la publication d\'annonces est gratuite ?', answer: 'Oui, la publication d\'annonces basiques est gratuite.' },
            { question: 'Comment puis-je modifier mon annonce ?', answer: "Connectez-vous à votre compte, allez dans 'Mes annonces', puis cliquez sur 'Modifier' sur la ligne de l'annonce concerné." },
            { question: "Combien de temps mon annonce reste-t-elle en ligne ?", answer: "Votre annonce reste en ligne jusqu'à suppression de votre part." },
            { question: 'Puis-je ajouter des photos à mon annonce ?', answer: 'Oui, vous pouvez ajouter jusqu\'à 10 photos par annonce.' },
            { question: "Comment contacter un vendeur ?", answer: "Vous pouvez appelez le numéro fourni dans l'annonce." },
            { question: "Immobilier Bénin offre-t-il des services de mise en avant ?", answer: "Oui, nous proposons des options pour mettre en avant vos annonces et votre profil, allez dans 'Mon compte' depuis votre tableau de bord et cochez l'option de mise en avant." }
          ]
        };
      },
      methods: {
        toggle(index) {
          this.activeIndex = this.activeIndex === index ? null : index;
        }
      }
    };
</script>