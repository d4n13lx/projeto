$(document).ready(function () {
    // Evento de clique para elementos com id começando com "Regional"
    $('g[id^="Regional"]').click(function () {
        const elementoAtual = $(this); // O elemento atual que foi clicado
        const regiao = elementoAtual.attr('id').replace('Regional', ''); // Pega o ID da região, remove 'Regional'
        
        console.log('Região enviada:', regiao); // Log da região que está sendo enviada

        consultarRegiao(regiao);
    });

    // Função para consultar a região
    function consultarRegiao(regiao) {
        fetch('MVC/App/Controller/Pages/Casos.php', { // Caminho para o seu controlador
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Tipo de conteúdo para envio
            },
            body: 'regiao=' + encodeURIComponent(regiao) // Envia a região como parâmetro POST
        })
        .then(response => {
            console.log('Status da resposta:', response.status); // Log do status da resposta
            if (!response.ok) {
                throw new Error('Erro na requisição: ' + response.status);
            }
            return response.text(); // Pega o corpo da resposta como texto
        })
        .then(data => {
            console.log('Dados recebidos:', data); 
            const contentElement = document.getElementById('Content'); // Encontrar o elemento com ID "Content"
            if (contentElement) {
                contentElement.innerHTML = data; // Atualiza o conteúdo da página com os dados recebidos
                
                // Recarrega a página após atualizar os dados
                window.location.reload(); 
            } else {
                console.error('Elemento com ID "Content" não encontrado.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao consultar a região.'); // Mensagem de erro para o usuário
        });
    }
});

$(document).ready(function () {
    // Seleciona os elementos g#RegionalCentro-Sul, g#RegionalOeste, g#RegionalNordeste, g#RegionalNoroeste, g#RegionalNorte, g#RegionalPampulha, g#RegionalVenda-Nova, g#RegionalBarreiro
    const centroSul = $('#RegionalCentro-Sul');
    const oeste = $('#RegionalOeste');
    const nordeste = $('#RegionalNordeste');
    const noroeste = $('#RegionalNoroeste');
    const norte = $('#RegionalNorte');
    const pampulha = $('#RegionalPampulha');
    const vendaNova = $('#RegionalVenda-Nova');
    const barreiro = $('#RegionalBarreiro');

    // Função para restaurar a ordem padrão de todas as regionais


    // Função para verificar e restaurar a ordem se não houver g#Regional... selecionado
    function verificarMouseFora() {
        if (!$('g[id^="Regional"]').is(':hover')) {
            restaurarOrdemPadrao();  // Se o mouse não estiver em nenhuma área, restaura a ordem padrão
        }
    }

    // Função para trocar a ordem com o Barreiro
    function trocarComBarreiro(elemento) {
        // Insere o elemento atual antes do Barreiro
        barreiro.before(elemento);
    }

    // Eventos para as regiões
    $('g[id^="Regional"]').mouseenter(function () {
        const elementoAtual = $(this); // O elemento atual que o mouse passou por cima
        // Verifica se o elemento atual não é o Barreiro
        if (elementoAtual.attr('id') !== 'RegionalBarreiro') {
            trocarComBarreiro(elementoAtual); // Troca a ordem com o Barreiro
        }
    }).mouseleave(function () {
        verificarMouseFora();  // Verifica se o mouse saiu de todas as áreas e restaura se necessário
    });
});
