package biblioteca;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

//@author jessica
public class Livros {

    private String nomeLivro, nomeAutor;
    private int codigo;
    List<Livros> listaLivros = new ArrayList();//CRIAÇÃO DO ARRAY LIST
    List<Livros> listaEmprestimo = new ArrayList();
    Scanner input = new Scanner(System.in);

    //CRIAÇÃO DO SUBMENU DOS LIVROS
    public void menuLivros() {
        int opcao;
        Scanner input = new Scanner(System.in);

        System.out.println("=========================");
        System.out.println("         LIVROS");
        System.out.println("=========================");

        System.out.println("Escolha um serviço");
        System.out.println("1- CADASTRAR LIVROS");
        System.out.println("2- LISTAR LIVROS");
        System.out.println("3- EMPRÉSTIMO DE LIVROS");
        System.out.println("4- Voltar ao menu principal");
        System.out.print("Sua opção é: ");
        opcao = input.nextInt();
        System.out.println("=========================");

        switch (opcao) {
            //CHAMA O MÉTODO DECADASTRO DE LIVRO
            case 1:
                cadastroLivro();
                break;
            //CHAMA O MÉTODO DE CONSULTA
            case 2:
                consultaLivro();
                break;
            //CHAMA O MÉTODO DE EMPRÉSTIMO DE LIVROS
            case 3:
                emprestarLivro();
                break;

            case 4:
                menuPrincipal menu = new menuPrincipal();
                menu.MenuPrincipal();
                break;
            default:
                System.out.println("Opção inválida!");
                break;
        }
    }

    //TRABALHANDO COM SET E O GET

    public String getnomeLivro() {
        return this.nomeLivro;
    }

    public String getnomeAutor() {
        return this.nomeAutor;
    }

    public int getcodigo() {
        return this.codigo;
    }

    public void setnomeLivro(String nomeLivro) {
        this.nomeLivro = nomeLivro;
    }

    public void setnomeAutor(String nomeAutor) {
        this.nomeAutor = nomeAutor;
    }

    public void setcodigo(int codigo) {
        this.codigo = codigo;
    }

    public Livros() {

    }

    public Livros(String nomeLivro, String nomeAutor) {
        this.nomeLivro = nomeLivro;
        this.nomeAutor = nomeAutor;
    }

    // MÉTODO PARA CADASTRAR OS LIVROS
    public void cadastroLivro() {
        Livros novoLivro = null; //CRIANDO OBJETO

        int continuarCadastrando = 1;

        while (continuarCadastrando == 1) {

            novoLivro = new Livros(nomeLivro, nomeAutor);

            System.out.print("Livro: "); //MENSAGEM PARA DIGITAR O NOME DO LIVROS
            String nomeLivro = input.nextLine(); //LÊ O TEXTO DIGITADO
            novoLivro.setnomeLivro(nomeLivro); // CONFIGURA A LEITURA DO TEXTO PARA O COMANDO .set
            input.nextLine();

            System.out.print("Autor: ");
            String nomeAutor = input.nextLine();
            novoLivro.setnomeAutor(nomeAutor);

            int validacao = pesquisa(nomeAutor);
            if (validacao == 1) {
                System.out.println("Esse livro e esse autor já foram registrados!");
                System.out.println();
                cadastroLivro();
            } else {
                System.out.println();
            }

            listaLivros.add(novoLivro);

            String msg = "Deseja continuar cadastrando livros? 1-sim 0-não";

            System.out.println(msg);
            System.out.print("Sua opção é: ");
            continuarCadastrando = input.nextInt();
            System.out.println();

            if (continuarCadastrando == 0) {
                menuLivros();
            }
        }
    }

    //FUNÇÃO PARA PERCORRER O ARRAYLIST

    public int pesquisa(String nomeAutor) {
        for (int i = 0; i < listaLivros.size(); i++) {
            if (listaLivros.get(i).nomeAutor.equals(nomeAutor) || listaLivros.get(i).nomeLivro.equals(nomeLivro)) {
                return 1;
            }
        }
        return -1;
    }

    //MÉTODO PARA CONSULTA DOS LIVROS
    public void consultaLivro() {

        for (Livros novoLivro : listaLivros) {
            System.out.println();
            System.out.println("NOME DO LIVRO: " + novoLivro.getnomeLivro());
            System.out.println("NOME DO AUTOR: " + novoLivro.getnomeAutor());
            System.out.println();
            System.out.println("1- Voltar ao menu LIVROS   0- Voltar ao menu principal ");
            System.out.print("Sua opção é: ");
            Scanner input = new Scanner(System.in);
            int continuarConsulta = input.nextInt();

            if (continuarConsulta == 1) {
                menuLivros();
            } else if (continuarConsulta == 0) {
                menuPrincipal menu = new menuPrincipal();
                menu.MenuPrincipal();
            } else {
                System.out.println("Opção inválida!");
            }
        }
    }

    //MÉTODO DE EMPRESTIMO DE LIVROS CONTENDO A DEVOLUÇÃO

    public void emprestarLivro() {

        Livros novoemprestimo = null;
        String situacao = "Disponivel";
        int codigo;

        System.out.println("LIVROS DISPONIVEIS PARA EMPRÉSTIMOS");
        System.out.println("=======================================\n");
        System.out.println("CODIGO| LIVRO|  AUTOR|  SITUAÇÃO");
        System.out.println("-----------------------------------------");
        for (codigo = 0; codigo < listaLivros.size(); codigo++) {
            System.out.println(codigo + "| " + listaLivros.get(codigo).getnomeLivro() + "|  " + listaLivros.get(codigo).getnomeAutor() + "|  " + situacao);
        }
        System.out.println("----------------------------------------------\n");

        System.out.println("EMPRÉSTIMO IGUAL OU INFERIOR A 3 LIVROS \n");

        System.out.print("Quantidade de livros que deseja emprestar: ");
        int quantidadeLivros = input.nextInt();
        System.out.println("");

        for (int i = 0; i < quantidadeLivros; i++) {

            novoemprestimo = new Livros();

            System.out.print("Código do Livro: ");
            int codigoLivro = input.nextInt();
            novoemprestimo.setcodigo(codigo);
            System.out.println("");

            System.out.println("CODIGO| LIVRO|  AUTOR|  SITUAÇÃO");
            System.out.println("-----------------------------------------");
            for (codigo = 0; codigo < listaLivros.size(); codigo++) {
                if (codigo == codigoLivro) {
                    situacao = "Emprestado";
                } else {
                    situacao = "Disponivel";
                }
                System.out.println(codigo + "| " + listaLivros.get(codigo).getnomeLivro() + "|  " + listaLivros.get(codigo).getnomeAutor() + "|  " + situacao);
            }
            listaEmprestimo.add(novoemprestimo);
        }

        System.out.println("");
        System.out.println("O prazo do empréstimo é de 7 dias!");
        System.out.println("--------------------------------------------\n");

        System.out.println("1- Devolver algum livro   0- Voltar ao menu de LIVROS ");
        System.out.print("Sua opção é: ");
        int continuar = input.nextInt();

        if (continuar == 1) {
            System.out.println("Atraso de devolução   1-SIM     0-NÃO  ");
            System.out.print("Sua opção: ");
            int atraso = input.nextInt();
            System.out.println("");
            if (atraso == 1) {
                System.out.print("Numero de dias de atraso: ");
                int dias = input.nextInt();
                float multa = (dias * 4);
                System.out.println("Taxa de multa a ser paga é de: " + multa);

                System.out.print("Código do Livro: ");
                int codigoLivro = input.nextInt();
                novoemprestimo.setcodigo(codigo);
                System.out.println("");

                System.out.println("CODIGO| LIVRO|  AUTOR|  SITUAÇÃO");
                System.out.println("-----------------------------------------");
                for (codigo = 0; codigo < listaLivros.size(); codigo++) {
                    if (codigo == codigoLivro) {
                        situacao = "Disponivel";
                    } else {
                        situacao = "Disponivel";
                    }
                    System.out.println(codigo + "| " + listaLivros.get(codigo).getnomeLivro() + "|  " + listaLivros.get(codigo).getnomeAutor() + "|  " + situacao);
                }
                System.out.println("Livro devolvido com sucesso! \n");

                System.out.println("1-Voltar ao menu LIVROS     0-MENU PRINCIPAL");
                int opcao = input.nextInt();
                if (opcao == 1) {
                    menuLivros();
                } else {
                    menuPrincipal menu = new menuPrincipal();
                    menu.MenuPrincipal();
                }
            } else {
                System.out.print("Código do Livro: ");
                int codigoLivro = input.nextInt();
                novoemprestimo.setcodigo(codigo);
                System.out.println("");

                System.out.println("CODIGO| LIVRO|  AUTOR|  SITUAÇÃO");
                System.out.println("-----------------------------------------");
                for (codigo = 0; codigo < listaLivros.size(); codigo++) {
                    if (codigo == codigoLivro) {
                        situacao = "Disponivel";
                    } else {
                        situacao = "Disponivel";
                    }
                    System.out.println(codigo + "| " + listaLivros.get(codigo).getnomeLivro() + "|  " + listaLivros.get(codigo).getnomeAutor() + "|  " + situacao);
                }
                System.out.println("Livro devolvido com sucesso!\n");
                System.out.println("1-Voltar ao menu LIVROS     0-MENU PRINCIPAL");
                int opcao = input.nextInt();
                if (opcao == 1) {
                    menuLivros();
                } else {
                    menuPrincipal menu = new menuPrincipal();
                    menu.MenuPrincipal();
                }
            }

        } else if (continuar == 0) {
            menuLivros();
        } else {
            System.out.println("Opção inválida!");
        }

    }

}
