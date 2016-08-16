
package biblioteca;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

// @author jessica

public class Leitores {
    private String nomeLeitor;
    private int cpf;
    List<Leitores> listaLeitores = new ArrayList<Leitores>();

	public void menuLeitores(){
		int opcao;
		Scanner input = new Scanner(System.in);
		
		System.out.println("=========================");
		System.out.println("         LEITORES");
		System.out.println("=========================");
		
		System.out.println("Escolha um serviço");
		System.out.println("1- CADASTRAR LEITORES");
		System.out.println("2- LISTAR LEITORES");
		System.out.println("3- Voltar ao menu principal");
		System.out.print("Sua opção é: ");
		opcao = input.nextInt();
                System.out.println("=========================");
		
		
		switch (opcao){
		case 1:
                    cadastroLeitor();
                    break;
		case 2:
                    consultaLeitor();
                    break;
		case 3:
                    menuPrincipal menu = new menuPrincipal();
                    menu.MenuPrincipal();
                    break;
                default:
                    System.out.println("Opção inválida!");
		}
	}
	
	public String getnomeLeitor() {
		return this.nomeLeitor;
	}
	
	public int getcpf(){
		return this.cpf;
	}
	
	public void setnomeLeitor(String nomeLeitor){
		this.nomeLeitor = nomeLeitor;
	}
	
	public void setcpf(int cpf){
		this.cpf = cpf;
	}

        public Leitores(){
            
        }
        
        public Leitores(String nomeLeitor, int cpf){
            this.nomeLeitor = nomeLeitor;
            this.cpf = cpf;
        }
        
	public void cadastroLeitor(){
	Scanner input = new Scanner(System.in);
            
            Leitores novoLeitor = null;

            int continuarCadastrando = 1;

            while (continuarCadastrando == 1){
                
                novoLeitor = new Leitores(nomeLeitor, cpf);
                
                    System.out.print("Nome: ");
                    String nomeLeitor = input.nextLine();
                    novoLeitor.setnomeLeitor(nomeLeitor);
                    input.nextLine();

                    System.out.print("CPF: ");
                    int cpf = input.nextInt();
                    novoLeitor.setcpf(cpf);

                    int validacao = pesquisa(cpf);
                    if(validacao==1){
                        System.out.println("CPF já registrado! Digite novamente!");
                        System.out.println();
                        cadastroLeitor();
                    }else{
                        System.out.println();
                    }
                    
                    listaLeitores.add(novoLeitor);
                                
            String msg = "Deseja continuar cadastrando leitor? 1-sim 0-não";

                    System.out.println(msg);
                    System.out.print("Sua opção é: ");
                    continuarCadastrando=input.nextInt();
                    System.out.println();
                    
                   
                   if (continuarCadastrando==0){
                        menuLeitores();
                   }
            }	
        }

        //FUNÇÃO PARA PERCORRER O ARRAYLIST
        public int pesquisa(int cpf){
            for(int i=0; i<listaLeitores.size();i++){
			if (listaLeitores.get(i).getcpf()== cpf){
				return 1;
			}
            }		
	return -1;
        }

	public void consultaLeitor(){
            Scanner input = new Scanner(System.in);
            
                for(Leitores novoLeitor : listaLeitores){
                        System.out.println();
                        System.out.println("NOME: "+ novoLeitor.getnomeLeitor());
                        System.out.println("CPF: "+ novoLeitor.getcpf());
                        System.out.println();
                        System.out.println("1- Voltar ao menu LEITORES  0- Voltar ao menu principal ");
                        System.out.print("Sua opção é: ");
                        int continuar = input.nextInt();
                        
                        if (continuar == 1){
                                menuLeitores();
                        }else if (continuar == 0){
                                menuPrincipal menu = new menuPrincipal();
                                menu.MenuPrincipal();
                        }else
                                System.out.println("Opção inválida!");
                }
        }
    
}
