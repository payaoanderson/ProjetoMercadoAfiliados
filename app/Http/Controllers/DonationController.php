<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Endroid\QrCode\Label\Margin\Margin;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class DonationController extends Controller
{
    // Exibe a lista de doações
    public function index()
    {
        $donations = Donation::all(); // Pegando todas as doações
        return view('admin.donations.index', compact('donations'));
    }

    // Exibe o formulário para criar uma nova doação
    public function create()
    {
        return view('admin.donations.create');
    }

    // Armazena uma nova doação
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
        ]);

        $donation = new Donation();
        $donation->value = $request->value;
        $donation->save();

        return redirect()->route('admin.donations.index')->with('success', 'Doação criada com sucesso!');
    }

    // Exibe o formulário para editar uma doação existente
    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        return view('admin.donations.edit', compact('donation'));
    }

    // Atualiza uma doação existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
        ]);

        $donation = Donation::findOrFail($id);
        $donation->value = $request->value;
        $donation->save();

        return redirect()->route('admin.donations.index')->with('success', 'Doação atualizada com sucesso!');
    }


    public function destroy($id)
    {
        // Encontre a doação pelo ID
        $donation = Donation::findOrFail($id);

        // Exclua a doação
        $donation->delete();

        // Redirecione para a lista de doações com uma mensagem de sucesso
        return redirect()->route('admin.donations.index')->with('success', 'Doação excluída com sucesso!');
    }

    // Deleta uma doação
   
    
   
        // Outros métodos...
    
    
        // Método para gerar o QR Code
        public function generate(Request $request, $id)
        {
            // Encontre a doação no banco de dados
            $donation = Donation::findOrFail($id);
    
            // Defina sua chave PIX (substitua pelo seu e-mail)
            $pixKey = 'andersonpayao018@gmail.com'; // Substitua pelo seu e-mail (chave PIX válida)
            
            // Formatar o valor da doação
            $value = number_format($donation->value, 2, '.', '');


            

            
            // Criar o payload para o QR Code
            $payload = "00020126330014br.gov.bcb.pix011146285635862520400005303986540510.005802BR5925ANDERSON FONSECA DIAS PAY6009Sao Paulo62290525REC6785745D4AEAE3833741476304C22D";
    
            // Criar o QR Code
            $qrCode = new QrCode($payload);
    
    
            // Gerar o QR Code no formato PNG
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
    
            // Retornar o QR Code como imagem
            return response($result->getString(), 200)->header('Content-Type', 'image/png');
        }
    }
        // Outros métodos...
    
    

