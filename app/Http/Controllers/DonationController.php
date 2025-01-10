<?php

namespace App\Http\Controllers;

use App\Models\Donation;
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
    
        public function generateQrCode($id)
        {
            // Encontre a doação com base no ID
            $donation = Donation::findOrFail($id);
            
            // Chave PIX - altere conforme necessário
            $pixKey = 'andersonpayao018@gmail.com';
            
            // Formatar o valor da doação
            $value = number_format($donation->value, 2, '', '');
            
            // Gerar o payload para o QR Code com base no padrão do PIX
            $payload = "00020101021226820014br.gov.bcb.pix0114{$pixKey}520400005303986540{$value}5802BR5925Doação via QR Code6304";
    
            // Criar o QR Code com a biblioteca Endroid
            $qrCode = new QrCode($payload);
    
    
            // Usar o writer para gerar a imagem em PNG
            $writer = new PngWriter();
            $image = $writer->write($qrCode);
    
            // Retornar o QR Code como imagem PNG
            return response($image->getString(), 200)
                ->header('Content-Type', 'image/png');
        }
    
        // Outros métodos...
    
    
}
