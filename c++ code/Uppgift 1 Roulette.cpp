#include "pch.h"
#include <iostream> 
#include <random>
#include <string>
#include <array> 
#include <algorithm>
#include <clocale>

using namespace std;

//Nedan är en funktion som slumpar ett värde mellan två olika värden.
int Random(int min, int max) {
				std::random_device rd;
				std::mt19937 eng(rd());
				std::uniform_int_distribution<> distr(min, max);
				return distr(eng);
			}

int main()
{
	setlocale(LC_ALL, "swedish");
	//Värdet som ska satsas dras från kontot. 
	int KontoVal = 1000;
	std::string SpelarKort;
	string SpelarFarg;
	while (KontoVal >= 0)
	{
		int SatsaVal;
		cout << "Hur mycket pengar vill du satsa?\n";
		cin >> SatsaVal;
		if (SatsaVal <= KontoVal && SatsaVal > 0) {
			KontoVal = KontoVal-SatsaVal;
			cout << SatsaVal << " kronor har dragits från ditt konto.\n";
			cout << KontoVal << " finns nu på ditt konto.\n";

			//Det gissade värdet och det slumpade värdet fastställs, och jämförs med varandra.
			int KontrollVal = 1;
			while (KontrollVal < 2)
			{
				cout << "Vilken färg gissar du? (rött/svart)\n";
				cin >> SpelarFarg;
				int GissaVal;
				cout << "Vilket nummer mellan 1 till 36 gissar du?\n";
				cin >> GissaVal;
			
				if (GissaVal < 37 && GissaVal > 0) {
					KontrollVal++;
					int RandomVar = Random(1,36);
					cout << "Detta värde har slumpats: " <<  RandomVar;

					//Om det gissade värdet är rätt, sätts in ett värde som är 10 gånger så större än värdet som satsades på kontot. Om det är fel, sätts inga pengar in. 
					if (GissaVal == RandomVar){
				int SatsaValMultipliedTen;
				SatsaValMultipliedTen = SatsaVal * 10;
				KontoVal = KontoVal + SatsaValMultipliedTen;
				cout << "\nDu gissade rätt nummer! Du har vunnit " << SatsaValMultipliedTen << " kronor.\n";
			
				if (KontoVal == 0) {
					cout << "Du har inte tillräckligt med pengar för att fortsätta spelet och har förlorat.\n";
					return 0;
				}

			}
					else if (GissaVal != RandomVar) {
				cout << "\nDu gissade fel nummer och har förlorat " <<  SatsaVal  << " kronor.\n";
			
				//Spelet avbryts automatiskt när spelaren inte längre har pengar kvar på kontot. 
				if (KontoVal == 0) {
					cout << "Du har inte tillräckligt med pengar för att fortsätta spelet och har förlorat.\n";
					return 0;
				}

				//Färgen slumpas och om den gissade färgen är rätt sätts pengar in på kontot.
				int SatsaValMultipliedTwo;
				if (RandomVar == 35 || RandomVar == 33 || RandomVar == 31 || RandomVar == 29 || RandomVar == 27 || RandomVar == 25 || RandomVar == 23 || RandomVar == 21 || RandomVar == 19 || RandomVar == 17 || RandomVar == 15 || RandomVar == 13 || RandomVar == 11 || RandomVar == 9 || RandomVar == 7 || RandomVar == 5 || RandomVar == 3 || RandomVar == 1) {
					const char* rott = "rött";
					if (SpelarFarg == rott) {
						SatsaValMultipliedTwo = SatsaVal * 2;
						KontoVal = KontoVal + SatsaValMultipliedTwo;
						cout << "Du gissade rätt färg och har vunnit " << SatsaValMultipliedTwo << " kronor.\nDu har nu " << KontoVal << " kronor på ditt konto.\n";
					}
					else if (SpelarFarg != rott) {
						cout << "Du gissade fel färg. Du har nu " << KontoVal << " kronor på ditt konto.\n";
					}
				}
				else if (RandomVar == 36 || RandomVar == 34 || RandomVar == 32 || RandomVar == 30 || RandomVar == 28 || RandomVar == 26 || RandomVar == 24 || RandomVar == 22 || RandomVar == 20 || RandomVar == 18 || RandomVar == 16 || RandomVar == 14 || RandomVar == 12 || RandomVar == 10 || RandomVar == 8 || RandomVar == 6 || RandomVar == 4 || RandomVar == 2) {
					const char* svart = "svart";
					if (SpelarFarg == svart) {
						SatsaValMultipliedTwo = SatsaVal * 2;
						KontoVal = KontoVal + SatsaValMultipliedTwo;
						cout << "Du gissade rätt färg och har vunnit " << SatsaValMultipliedTwo << " kronor.\nDu har nu " << KontoVal << " kronor på ditt konto.\n";
					}
					else if (SpelarFarg != svart) {
						cout << "Du gissade fel färg. Du har nu " << KontoVal << " kronor på ditt konto.\n";
					}
				}

				//Spelet avbryts automatiskt när spelaren inte längre har pengar kvar på kontot. 
				if (KontoVal == 0) {
					cout << "Du har inte tillräckligt med pengar för att fortsätta spelet och har förlorat.\n";
					return 0;
				}

				//Efter varje spelomgång får spelaren frågan om hen vill fortsätta spela spelet. 
				cout << "Vill du fortsätta spelet? (ja/nej)\n";
				string SvarVal;
				cin >> SvarVal;
				if (SvarVal == "nej") {
					return 0;
				}
			}
				}
				else if (GissaVal > 36 || GissaVal <= 0) {
					cout << "Detta nummer fungerar inte. Skriv in ett nytt nummer.\n";
				}
			}
		}
		//Värdet som ska satsas får inte överskrida värdet på kontot. 
		else if (SatsaVal > KontoVal || SatsaVal <= 0) {
			cout << "Det värdet fungerar inte. Skriv in ett nytt värde.\n";
		}


		//Spelet avslutas automatiskt när pengarna på kontot har tagit slut. 
		if (KontoVal == 0) {
			cout << "Du har inte tillräckligt med pengar för att fortsätta spelet och har förlorat.\n";
			return 0;
		}
	
	}
	cin.ignore();
	cin.get();
	return 0;
}