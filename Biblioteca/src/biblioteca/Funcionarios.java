package biblioteca;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

//@author jessica
public class Funcionarios {

    private String nomeFuncionario;
    private int cpf;

    List<Funcionarios> listaFuncionarios = new ArrayList<Funcionarios>();

    public void menuFuncionarios() {
        int opcao;
        Scanner input = new Scanner(System.in);

        System.out.println("=========================");
        System.out.println("      FUNCIONAIOS");
        System.out.println("=========================");

        System.out.println("Escolha um serviço");
        System.out.println("1- CADASTRAR FUNCIONARIO");
        System.out.println("2- LISTAR FUNCIONARIOS");
        System.out.println("3- Voltar ao menu principal");
        System.out.print("Sua opção é: ");
        opcao = input.nextInt();
        System.out.println("=========================");

        switch (opcao) {
            case 1:
                cadastroFuncionario();
                break;
            case 2:
                consultaFuncionario();
                break;
            case 3:
                menuPrincipal menu = new menuPrincipal();
                menu.MenuPrincipal();
                break;
            default:
                System.out.println("Opção inválida!");
        }
    }

    public String getnomeFuncionario() {
        return this.nomeFuncionario;
    }

    public int getcpf() {
        return this.cpf;
    }

    public void setnomeFuncionario(String nomeFuncionario) {
        this.nomeFuncionario = nomeFuncionario;
    }

    public void setcpf(int cpf) {
        this.cpf = cpf;
    }
    
    public Funcionarios(){
        
    }
    
    public Funcionarios(String nomeFuncionario, int cpf){
        this.nomeFuncionario = nomeFuncionario;
        this.cpf = cpf;
    }

    public void cadastroFuncionario() {
        Scanner input = new Scanner(System.in);

        Funcionarios novoFuncionario = null;

        int continuarCadastrando = 1;

        while (continuarCadastrando == 1) {

            novoFuncionario = new Funcionarios(nomeFuncionario, cpf);

            System.out.print("Nome do funcionário: ");
            String nomeFuncionario = input.nextLine();
            novoFuncionario.setnomeFuncionario(nomeFuncionario);
            input.nextLine();

            System.out.print("CPF do funcionário: ");
            int cpf = input.nextInt();
            novoFuncionario.setcpf(cpf);


            int validacao = pesquisa(cpf);
            if (validacao == 1) {
                System.out.println("CPF já registrado! Digite novamente!");
                System.out.println();
                cadastroFuncionario();
            } else {
                System.out.println();
            }

            listaFuncionarios.add(novoFuncionario);

            String msg = "Deseja continuar cadastrando funcionário? 1-sim 0-não";

            System.out.println(msg);
            System.out.print("Sua opção é: ");
            continuarCadastrando = input.nextInt();
            System.out.println();

            if (continuarCadastrando == 0) {
                menuFuncionarios();
            }
        }
    }

        //FUNÇÃO PARA PERCORRER O ARRAYLIST
        public int pesquisa(int cpf) {
            for (int i = 0; i < listaFuncionarios.size(); i++) {
                if (listaFuncionarios.get(i).getcpf() == cpf) {
                    return 1;
                }
            }
            return -1;
        }
    
    public  void consultaFuncionario(){
            Scanner input = new Scanner(System.in);
            
                for(Funcionarios novoFuncionario : listaFuncionarios){
                        System.out.println();
                        System.out.println("NOME DO FUNCIONÁRIO: "+ novoFuncionario.getnomeFuncionario());
                        System.out.println("CPF DO FUNCIONÁRIO: "+ novoFuncionario.getcpf());
                        System.out.println();
                        System.out.println("1- Voltar ao menu FUNCIONÁRIOS   0- Voltar ao menu principal ");
                        System.out.print("Sua opção é: ");
                        int continuar = input.nextInt();
                        
                        if (continuar == 1){
                          menuFuncionarios();
                        }else if (continuar == 0){
                                menuPrincipal menu = new menuPrincipal();
                                menu.MenuPrincipal();
                        }else
                                System.out.println("Opção inválida!");
                }
        }
}

