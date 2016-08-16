
package biblioteca;

import java.util.ArrayList;
import java.util.Scanner;

//@author jessica

public class menuPrincipal {

	public void MenuPrincipal(){
		int opcao;
		Scanner input = new Scanner(System.in);
		
		System.out.println("=========================");
		System.out.println("         MENU");
		System.out.println("=========================");
		
		System.out.println("Escolha um serviço");
		System.out.println("1- LIVROS");
		System.out.println("2- LEITORES");
		System.out.println("3- FUNCIONÁRIOS");
		System.out.println("4- Encerrar o programa");
                System.out.print("Sua opção é: ");
		opcao = input.nextInt();
                System.out.println("=========================");   
		
		switch (opcao){
		
		case 1:
			Livros submenuLivros = new Livros();
			submenuLivros.menuLivros();
			break;
		case 2:
			Leitores submenuLeitores = new Leitores();
			submenuLeitores.menuLeitores();
			break;
		case 3:
			Funcionarios submenuFuncionarios = new Funcionarios();
			submenuFuncionarios.menuFuncionarios();
		case 4:
			System.exit(opcao);
			break;
		default:
			System.out.println("Opcao inválida!");
                        break;
		}
	} 

    public static void main(String[] args) {
        
        menuPrincipal menu = new menuPrincipal();//objeto do menu principal
		menu.MenuPrincipal();

    }
    
}
